
<?php include('header.php');?>
        <!-- Chat -->

        <main class="main is-visible" data-dropzone-area="">
            <div class="container h-100">

                <div class="d-flex flex-column h-100 position-relative">
                    <!-- Chat: Header -->
                    <div class="chat-header border-bottom py-4 py-lg-7">
                        <div class="row align-items-center">

                            <!-- Mobile: close -->
                            <div class="col-2 d-xl-none">
                                <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-chevron-left">
                                        <polyline points="15 18 9 12 15 6"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <!-- Mobile: close -->

                            <!-- Content -->
                            <div class="col-8 col-xl-12">
                                <div class="row align-items-center text-center text-xl-start">
                                    <!-- Title -->
                                    <div class="col-12 col-xl-6">
                                        <div class="row align-items-center gx-5">
                                            <div class="col-auto">
                                                <div
                                                    class="avatar <?php if($user_reciever[0]['status']==1){ echo ' avatar-online ';}else{ echo ' avatar-offline '; }?> d-none d-xl-inline-block">
                                                    <img class="avatar-img"
                                                        src="<?php echo $user_reciever[0]['profile']; ?>" alt="">
                                                </div>
                                            </div>

                                            <div class="col overflow-hidden">
                                                <h5 class="text-truncate"><?php echo ucwords($user_reciever[0]['user_name']);?>
                                                </h5>
                                                <p class="text-truncate" id='status'>
                                                    <?php if($user_reciever[0]['status']==1){ echo "online"; }else{ echo 'last seen '.$last_seen2; }?>
                                                </p>
                                                <input type="hidden" id='main_status'
                                                    value="<?php if($user_reciever[0]['status']==1){ echo 'online'; }else{ echo 'offline'; }?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Title -->

                                    <!-- Toolbar -->
                                    <div class="col-xl-6 d-none d-xl-block">
                                        <div class="row align-items-center justify-content-end gx-6">
                                            <div class="col-auto">
                                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas"
                                                    data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                            </div>

                                            <div class="col-auto">
                                                <div class="avatar-group">
                                                    <!-- <a href="#" class="avatar avatar-sm" data-bs-toggle="modal"
                                                        data-bs-target="#modal-user-profile">
                                                        <img class="avatar-img"
                                                            src="<?php echo $user_reciever[0]['profile']; ?>" alt="#">
                                                    </a> -->

                                                    <a href="#" class="avatar avatar-sm" data-bs-toggle="modal"
                                                        data-bs-target="#modal-profile">
                                                        <img class="avatar-img"
                                                            src="<?php echo $_SESSION['profile']; ?>" alt="#">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Toolbar -->
                                </div>
                            </div>
                            <!-- Content -->

                            <!-- Mobile: more -->
                            <div class="col-2 d-xl-none text-end">
                                <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-more-vertical">
                                        <circle cx="12" cy="12" r="1"></circle>
                                        <circle cx="12" cy="5" r="1"></circle>
                                        <circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </a>
                            </div>
                            <!-- Mobile: more -->

                        </div>
                    </div>
                    <!-- Chat: Header -->

                    <!-- Chat: Content -->
                    <div class="chat-body hide-scrollbar flex-1 h-100">
                        <div class="chat-body-inner" style="padding-bottom: 87px">
                            <div id='appender' class="py-6 py-lg-12">

                                <!-- Message -->
                                <?php $i=0;foreach($user_chat as $value){
                                    if($i!=0){
                                    $datep=strtotime($user_chat[$i-1]['datetime']);
                                    $datec=strtotime($user_chat[$i]['datetime']);
                                    $date=new DateTime();
                                    $date_pre=date_format($date->setTimestamp($datep),"D M d");
                                    $date_cur=date_format($date->setTimestamp($datec),"D M d");
                                    // echo  date('Y-m-d',$datep)."\n";
                                    // echo date('Y-m-d',$datec);
                                    // echo date('Y-m-d',$datep)<date('Y-m-d',$datec);

                                    if(date('Y-m-d',$datep)>date('Y-m-d',$datec))
                                    {
                                       $date=$date_pre;
                                    ?>
                                <div class="message-divider">
                                    <small class="text-muted"><?php echo $date;?></small>
                                </div>
                                <?php }elseif(date('Y-m-d',$datep)<date('Y-m-d',$datec)){ $date=$date_cur;?>
                                <div class="message-divider">
                                    <small class="text-muted"><?php echo $date;?></small>
                                </div>
                                <?php }}if($value['sender']!=$_SESSION['id']){ 
                                    ?>
                                <div class="message">
                                    <div class="message-inner">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="message-text">
                                                    <p><?php echo $value['msg']?></p>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="message-footer">
                                            <span
                                                class="extra-small text-muted"><?php echo date('g:i A',strtotime($value['datetime']));?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php } else{?>
                                <!-- Message -->
                                <div class="message message-out">
                                    <div class="message-inner">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="message-text">
                                                    <p><?php echo $value['msg']?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="message-footer">
                                            <span
                                                class="extra-small text-muted"><?php echo date('h:i A',strtotime($value['datetime']));?></span>
                                            <?php if($value['seen_status']==1){?>
                                            <span class="extra-small text-muted">Seen</span>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <!-- Divider -->


                                <?php $i++;}?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Chat: Content -->

                <!-- Chat: Footer -->
                <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                    <!-- Chat: Files -->
                    <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                    </div>
                    <!-- Chat: Files -->

                    <!-- Chat: Form -->
                    <form id="prospects_form" onsubmit="return false" class="chat-form rounded-pill bg-dark"
                        data-emoji-form="" method='post'>
                        <div class="row align-items-center gx-0">
                            <div class="col-auto">
                                <a href="javascript:void(0)"
                                    class="btn btn-icon btn-link text-body rounded-circle dz-clickable" id="dz-btn">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-paperclip">
                                        <path
                                            d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                        </path>
                                    </svg> -->
                                </a>
                            </div>

                            <div class="col">
                                <div class="input-group">
                                    <textarea id='msg' class="form-control px-0" placeholder="Type your message..."
                                        rows="1" data-emoji-input="" data-autosize="true"
                                        style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 47px;"></textarea>

                                    <a href="javascript:void(0)" class="input-group-text text-body pe-0"
                                        data-emoji-btn="">
                                        <span class="icon icon-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-smile">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>

                            <div class="col-auto">
                                <button class="btn btn-icon btn-primary rounded-circle ms-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-send">
                                        <line x1="22" y1="2" x2="11" y2="13"></line>
                                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Chat: Form -->
                </div>
                <!-- Chat: Footer -->
            </div>

            </div>
        </main>


  <?php include('js.php');?>