        <h2 style="margin-top:0px"><?php echo $PageAttribute['title'] ?></h2>
        <form action="<?php echo $action; ?>" method="post">
            <div class="form-group">
                <label for="varchar">Kelas <?php echo form_error('kelas') ?></label>
                <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" maxlength="50" />
            </div>
           <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
           <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
           <button type="button" class="btn btn-seccondary" onclick="window.history.go(-1)">Batalkan</button>
        </form>