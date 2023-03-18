<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;



class Chat implements MessageComponentInterface {
    protected $clients;
    protected $conn;
    public function __construct() {
        $this->clients = new \SplObjectStorage;
        self::coonectiondb();
        date_default_timezone_set("Asia/Kolkata");
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
        $data=json_decode($msg);
        if($data->status=='send')
        {
          $query='insert into msg (`msg`,`sender`,`reciever`) values ("'.$data->msg.'","'.$data->sender_id.'","'.$data->reciever_id.'")';
          mysqli_query($this->conn,$query);
          $query='Select MAX(id) from msg';
          $result=mysqli_query($this->conn,$query);
          $msg_id=mysqli_fetch_array($result)['0'];
        }
        else
        {
            $msg_id='';
        }
        $data=['msg_id'=>$msg_id,'msg'=>$data->msg,'status'=>$data->status,'sender_id'=>$data->sender_id,'reciever_id'=>$data->reciever_id];
        $msg=json_encode($data);
        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    public function coonectiondb()
    {
        $user='root';
        $pass='';
        $servername='localhost';
        $db='massenger';
        $this->conn = mysqli_connect($servername, $user, $pass,$db);
    
        // Check connection
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
        {
            echo "db Connection successfull\n";
        }
    }
}