
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
				<a href="index.php?page=memb2" class="nav-item nav-memb2"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Customers</a>
				<!-- <--<a href="index.php?page=registered_members" class="nav-item nav-registered_members"><span class='icon-field'><i class="fa fa-id-card"></i></span> Membership Validity</a> --> 
				<a href="index.php?page=schedule" class="nav-item nav-schedule"><span class='icon-field'><i class="fa fa-calendar-day"></i></span> Schedule</a>
				<?php if( $_SESSION["login_id"] == 1): ?>
				<a href="index.php?page=plans" class="nav-item nav-plans"><span class='icon-field'><i class="fa fa-th-list"></i></span> Services</a>
				 <a href="index.php?page=sales" class="nav-item nav-sales"><span class='icon-field'><i class="fa fa-list"></i></span> Transaction</a> 
				<a href="index.php?page=trainer" class="nav-item nav-trainer"><span class='icon-field'><i class="fa fa-user"></i></span> Trainers</a>
				<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'><i class="fa fa-users"></i></span> Employees</a>
				<a href="index.php?page=allocation2" class="nav-item nav-allocation2"><span class='icon-field'><i class="fa fa-th-list"></i></span> Trainer allocation</a>
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav_collapse').click(function(){
		console.log($(this).attr('href'))
		$($(this).attr('href')).collapse()
	})
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
