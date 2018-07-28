<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Group Registration</div>
				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>

					<form class="form-horizontal" role="form" method="POST" action="<?php echo e(Route('register')); ?>" >
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

						<div class="form-group">
							<label class="col-md-4 control-label">First Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Middle Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="middle_name" value="<?php echo e(old('middle_name')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Last Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="<?php echo e(old('last_name')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Phone Number</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="phone_no" value="<?php echo e(old('phone_no')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>