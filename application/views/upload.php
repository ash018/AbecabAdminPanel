

<?php include('inc/header.php'); ?>
<?php echo $menubar; ?>

            
            



<?php //echo $error; ?>
<div class="container">
    <?php echo form_open_multipart('upload/upload_file'); ?>
        
        <div style="border: 0px solid; width: 260px; margin-top: 50px; margin-bottom: 20px;" >
            <div class="card-header" style="text-align: center; background-color: #2eb7c9; color: #fff;">
                Content Submission								

            </div>
            <div class="form-group" style="margin-bottom: 0rem;">
                <input type="text" name="SubscribeName" id="SubscribeName" class="form-control" placeholder="Your Name (Required)" required="true">
            </div>
            <div class="form-group" style="margin-bottom: 0rem;">
                <input type="email" name="SubscribeEmail" id="SubscribeEmail" class="form-control" placeholder="Email (Required)" required="true">
            </div>
            <div class="form-group" style="margin-bottom: 0rem;">
                <input type="text" name="SubscribePhone" id="SubscribeName" class="form-control" placeholder="Your Phone (Optional)">
            </div>
            <div class="form-group" style="margin-bottom: 0rem;">
                <input type="file" name="userfile" size="20" />
            </div>
            <br />
            <button type="submit" class="btn btn-custom form-control">SUBSCRIBE</button>
        </div>

    

    
    
    
    </form>
</div>
<?php include('inc/footer.php'); ?>



