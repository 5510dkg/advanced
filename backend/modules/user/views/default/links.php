<div class=" box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Label Generation</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <div class="box-body">

        <div class="row">
            <div class="col-md-12">
            <?php   if($regdp!='null'){ ?>
                <a class="btn btn-lg btn-success" target="_blank" href="<?=$regdp?>">Download Registered Post Labels</a>   
                
             <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php   if($ordp!='null'){ ?>
             <a class="btn btn-lg btn-success" target="_blank" href="<?=$ordp?>">Download Ordinary Post Labels</a>   
                
             <?php } ?>
            </div><br/><br/>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php   if($railp!='null'){ ?>
             <a class="btn btn-lg btn-success" target="_blank" href="<?=$railp?>">Download Railway Labels</a>   
                
             <?php } ?>
            </div><br/><br/>
            
            
        </div></div>
</div>