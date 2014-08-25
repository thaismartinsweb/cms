<section id="content">
	<section class="main">
		<h4 style="font-weight: bold"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
		<!-- List Options -->
		<div class="row-fluid">
			<section class="toolbar clearfix m-t-large m-b-large">
				<?php if($menu) { ?>
					<?php foreach($menu as $item) { ?>
						<a class="btn btn-<?php echo $item['color']?> btn-circle" href="<?php echo base_url() . $item['controller']?>">
							<i class="icon-<?php echo $item['icon']?>"></i>
							<?php echo $item['title']?>
						</a>
					<?php } ?>
				<?php } ?>
			</section>
		</div>
		<!-- ! List Options -->
		
      <div class="row-fluid">
        <div class="span12">
          <section class="panel"><form class="form-horizontal">
              <div class="row-fluid">
                <div class="span7">
                  <div class="control-group">
                    <label class="control-label">Photo</label>
                    <div class="controls media">
                      <div class="bg-light pull-left text-center media-large thumb-large"><i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i></div>
                      <div class="media-body">
                        <input type="file" title="Change" class="btn btn-small btn-info m-b-small"><br><button class="btn btn-small btn-default">Delete</button>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                      <input type="email" placeholder="test@example.com" class="bg-focus">
</div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Password</label>
                    <div class="controls">
                      <input type="password" id="inputPassword" placeholder="Password" class="bg-focus"><div class="line line-dashed m-t-large"></div>
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Username</label>
                    <div class="controls">
                      <input type="text" placeholder="Username">
</div>
                  </div>                  
                  <div class="control-group">
                    <label class="control-label">Account</label>
                    <div class="controls">
                      <select><option value="1">Editor</option>
<option value="0">Admin</option></select>
</div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Registered</label>
                    <div class="controls">
                      <input type="text" class="combodate" data-format="DD-MM-YYYY HH:mm" data-template="D  MMM  YYYY  -  HH : mm" name="datetime" value="21-12-2012 20:30">
</div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Profile</label>
                    <div class="controls">
                      <textarea placeholder="Profile" rows="5" class="input-xlarge"></textarea><div class="checkbox">
                        <label>
                          <input type="checkbox"> Agree the <a href="#">terms and policy</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">                      
                      <button type="submit" class="btn btn-white">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
                <div class="span5">
                  <div class="dropfile visible-lg">
                    <small>Drag and Drop file here</small>
                  </div>
                </div>
              </div>
            </form>
          </section>
</div>
      </div>
	 </section>
</section>