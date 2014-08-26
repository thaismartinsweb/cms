<section id="content">
	<section class="main">
		<h4 style="font-weight: bold"><i class="icon-large icon-<?php echo $icon ?>"></i><?php echo $title?></h4>
      <div class="row-fluid">
        <div class="span12">
          <section class="panel">
          	<form class="form-horizontal">
              <div class="row-fluid">
                <div class="span7">
                  <!-- Image -->
                  <div class="control-group">
                    <label class="control-label">Logo do Site</label>
                    <div class="controls media">
                      <div class="bg-light pull-left text-center media-large thumb-large">
                      	<i class="icon-user inline icon-light icon-3x m-t-large m-b-large"></i>
                      </div>
                      <div class="media-body">
                        <input type="file" title="Alterar" class="btn btn-small btn-info m-b-small">
                        <br><button class="btn btn-small btn-default">Deletar</button>
                      </div>
                    </div>
                  </div>
                  <!-- Image -->
                  
                  <!-- Input -->
                  <div class="control-group">
                    <label class="control-label">Email</label>
                    <div class="controls">
                      <input type="text" placeholder="Título do Site" class="bg-focus">
				 	          </div>
                  </div>
                  <!-- Input -->
                  
                  <!-- TextArea-->
                  <div class="control-group">
                    <label class="control-label">Descrição do Menu</label>
                    <div class="controls">
                      <textarea placeholder="Resumo sobre o menu" name="content" class="span4" rows="5"><?php echo isset($base['description']) ? $base['content'] : '';?></textarea>
                    </div>
                  </div>
                  <!-- TextArea-->

                  <!-- Select -->                 
                  <div class="control-group">
                    <label class="control-label">Account</label>
                    <div class="controls">
                      <select>
                      	<option value="1">Editor</option>
						            <option value="0">Admin</option>
          					  </select>
          					</div>
                  </div>
                  <!-- Select --> 
                  
                  <!-- Date Combo -->
                  <div class="control-group">
                    <label class="control-label">Registered</label>
                    <div class="controls">
                      <input type="text" class="combodate" data-format="DD-MM-YYYY HH:mm" data-template="D  MMM  YYYY  -  HH : mm" name="datetime" value="21-12-2012 20:30">
					</div>
                  </div>
                  <!-- Date Combo -->
                  
                  <!-- TextArea -->
                  <div class="control-group">
                    <label class="control-label">Profile</label>
                    <div class="controls">
                      <textarea placeholder="Profile" rows="5" class="input-xlarge"></textarea>
                    </div>
                  </div>
                  <!-- TextArea -->
                  
                  <!-- Checkbox -->
                  <div class="control-group">
                    <label class="control-label">Profile</label>
                    <div class="controls">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Agree the <a href="#">terms and policy</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <!-- Checkbox -->
                  
                  <!-- Button -->
                  <div class="control-group">
                    <div class="controls">                      
                      <button type="submit" class="btn btn-white">Cancel</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
				  <!-- Button -->
				  
				  <!-- DragAndDrop -->
					<div class="span5">
	                  <div class="dropfile visible-lg">
	                    <small>Drag and Drop file here</small>
	                  </div>
	                </div>
				 <!-- DragAndDrop -->
				 
              </div>
            </form>
          </section>
		</div>
      </div>
	</section>
</section>