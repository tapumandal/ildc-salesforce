<?php $__env->startSection('page_heading','Stock'); ?>
<?php $__env->startSection('section'); ?>

<?php $__env->startSection('section'); ?>
	<div>
		<div  >
			<div class="">
				<a href="<?php echo e(Route('update_stocks_view')); ?>"> <?php echo $__env->make('widgets.button', array('class'=>'info', 'value'=>'Update Stocks'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </a>
			</div>
		</div>
		<br>

		<div>
			<table class="table table-bordered">
	            <thead>
	                <tr>
						<th>SL no.</th>
						<th>Product Name</th>
						<th>Product Group</th>
						<th>Quantity</th>
						<th>Client</th>
						<th>Store</th>
						<th>Action</th>
	                </tr>
	            </thead>
	            <tbody>
	            	<?php ($i = 1); ?> 
		            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($i++); ?></td>
							<td><?php echo e($product->product_name.' ('.$product->packet_name.'('.$product->packet_quantity.')	'.$product->unit_name.'('.$product->unit_quantity.'))'); ?></td>
							<td><?php echo e($product->product_group); ?></td>
							<td><?php echo e($product->quantity); ?></td>
							<td><?php echo e($product->client_name.'( '.$product->address.' )'); ?></td>

							<form role="form" action="<?php echo e(Route('save_stock_action')); ?>/<?php echo e($product->id); ?>" method="post">

                				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

			                    <td>
									<select class="form-control input_required" name="location" required >
	                                    <option value="">Select Location</option>
	                                    <?php $__currentLoopData = $stock_states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock_state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                                        <option value="<?php echo e($stock_state->id); ?>"><?php echo e($stock_state->name); ?></option>
	                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                                </select>
	                            </td>
	                            <td>
	                            	<input style="float: left; width: 100% !important" class="form-control btn btn-warning" type="submit" value="Save" >
	                            </td>
			            	</form>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </tbody>
	        </table>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>