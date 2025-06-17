<?php $__env->startSection('title', 'Edit Application'); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container my-6 px-6 mx-auto grid">

            <!-- Breadcrumb -->
            <nav class="flex mb-4 text-gray-700 dark:text-gray-300 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo e(route('admin.dashboard')); ?>" class="inline-flex items-center hover:text-purple-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5 0h-2a2 2 0 01-2-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 01-2 2H3" />
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <a href="<?php echo e(route('admin.applications.index')); ?>" class="hover:text-purple-600">Applications</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mx-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-500 dark:text-gray-400">Edit</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Edit Application
            </h2>

            <!-- Form -->
            <form action="<?php echo e(route('admin.applications.update', $application->id)); ?>" method="POST" enctype="multipart/form-data" class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="flex flex-col sm:flex-row gap-6">
                    <div class="flex flex-col w-full gap-4">
                        <!-- Client Selection with Search -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Client</span>
                            <select id="client-select" required name="client_id" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled>Clientni tanlang</option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($client['id']); ?>" <?php echo e(old('client_id', $application->user_id) == $client['id'] ? 'selected' : ''); ?>><?php echo e($client['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>

                        <!-- Country Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Country</span>
                            <select name="country_id" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled>Countryni tanlang</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country['id']); ?>" <?php echo e(old('country_id', $application->country_id) == $country['id'] ? 'selected' : ''); ?>><?php echo e($country['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>

                        <!-- Field Name Dropdown -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Field Name</span>
                            <select name="field_id" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option disabled>Ish turini tanlang</option>
                                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($field['id']); ?>" <?php echo e(old('field_id', $application->field_id) == $field['id'] ? 'selected' : ''); ?>><?php echo e($field['title']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </label>

                        <!-- Status -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Application Status</span>
                            <select name="status" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option value="pending" <?php echo e(old('status', $application->status) == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="approved" <?php echo e(old('status', $application->status) == 'approved' ? 'selected' : ''); ?>>Approved</option>
                                <option value="rejected" <?php echo e(old('status', $application->status) == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                            </select>
                            <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                const statusSelect = document.querySelector('select[name="status"]');
                                const commentField = document.querySelector('textarea[name="comment"]');
                                const documentField = document.querySelector('input[name="document"]');

                                function updateFields() {
                                    const prevStatus = "<?php echo e($application->status); ?>";
                                    const currentStatus = statusSelect.value;

                                    if (currentStatus === 'approved') {
                                        commentField.disabled = false;
                                        documentField.disabled = false;
                                    } else {
                                        commentField.disabled = true;
                                        documentField.disabled = true;
                                    }
                                }

                                // Initial state
                                updateFields();

                                // Listen for status change
                                statusSelect.addEventListener('change', updateFields);
                            });
                        </script>
                    </div>

                    <div class="flex flex-col w-full gap-4">
                        
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Comment</span>
                            <textarea name="comment" rows="5" class="block disabled:opacity-50 w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter comment"><?php echo e(old('comment', $application->comment)); ?></textarea>
                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>

                        
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Document</span>
                            <input type="file" name="document" class="block disabled:opacity-50  w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                   focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                   dark:text-gray-300 dark:focus:shadow-outline-gray form-input">

                            <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>

                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end space-x-4 items-center">
                    <a href="<?php echo e(route('admin.applications.index')); ?>" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Back
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Application
                    </button>
                </div>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/applications/edit.blade.php ENDPATH**/ ?>