
<style>
	.collapse a{
		text-indent:10px;
	}
	nav#sidebar{
		background: url(assets/uploads/<?php echo $_SESSION['system']['cover_img'] ?>) !important
	}
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">
        <a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="index.php?page=sched" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Schedule</a>
			
				<a href="index.php?page=plans" class="nav-item nav-plans"><span class='icon-field'><i class="fa fa-th-list"></i></span> Services</a>
				<a href="index.php?page=allocation" class="nav-item nav-plans"><span class='icon-field'><i class="fa fa-th-list"></i></span> Trainer allocation</a>
			
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_POST['page']) ? $_POST['page'] : '' ?>').addClass('active')
</script>
