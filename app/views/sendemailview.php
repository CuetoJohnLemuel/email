<form class="container mt-2" style="" id="mailform" action="<?php echo site_url('Test/send_mail');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                <?php if(isset($errors))
                                    foreach($errors as $error){echo $error;}
                                ?>
              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label class="col-form-label text-dark" style="font-size: 22px"><b><i class="fas fa-user"></i>&nbsp;Sender <span class="text-danger">*</span></b></label>
                  <input type="email" id="sender" name="sender" class="form-control" placeholder="">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label class="col-form-label text-dark" style="font-size: 22px"><b><i class="fas fa-light fa-user"></i>&nbsp;Recipient <span class="text-danger">*</span></b></label>
                  <input type="email" id="recipient" name="recipient" class="form-control"  placeholder="">
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label class="col-form-label text-dark" style="font-size: 22px"><b><i class="fas fa-solid fa-lightbulb"></i>&nbsp;Subject <span class="text-danger">*</span></b></label>
                  <input type="text" id="subject" name="subject" class="form-control" placeholder="">
                </div>
                </div>

              <div class="row">
                <div class="col-md-12 form-group mb-5">
                  <label for="message" class="col-form-label text-dark" style="font-size: 22px"><b><i class="fas fa-solid fa-envelope"></i>&nbsp;Message <span class="text-danger">*</span></b></label>
                  <textarea type="text" id="message" name="message" class="form-control"  cols="30" rows="2"  placeholder=""></textarea>
                  <br>
                  <br>
                  <i class="fas fa-solid fa-paperclip"></i>&nbsp;<input type="file" name="userfile" size="20" />
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                <button class="btn btn-dark" style="width: 150px; font-size: 20px; background-color: #ffee59; color: black;" type="submit" value="Send" name="submit"><i class="fas fa-share"></i>&nbsp;Send</button>
                </div>
              </div>
            </form>