<div class="dashboard-content">
	<div class="form spacer-small">
	<form action="<?php echo URL; ?>administrateur/add_pages" method="post" enctype="multipart/form-data" >
        
        <div class="form-batch">
            <label for="title">Title</label><br>
            <input type="text"  name="title" required>
        </div>               
        <div class="form-batch">
            <label for="title">Contenu</label><br><br>
            <textarea name="content" ></textarea>
        </div>                 
        <div class="form-batch">
            <input type="submit" value="Ajouter" name="create_content" >
        </div>
    </form>	
	</div>
</div>