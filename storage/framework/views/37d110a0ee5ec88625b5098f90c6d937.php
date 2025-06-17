<?php $__env->startSection('title', 'Add New Field'); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container my-6 px-6 mx-auto grid">
            <!-- Breadcrumb -->
            <nav class="flex mb-4 text-gray-700 dark:text-gray-300 text-sm" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 sm:space-x-3">
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
                            <span class="text-gray-500 dark:text-gray-400">Add New</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add New Field
            </h2>

            <form action="<?php echo e(route('admin.fields.store')); ?>" method="POST" enctype="multipart/form-data" class="w-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                <?php echo csrf_field(); ?>

                <!-- Inputlar -->
                <div class="flex flex-col items-start justify-center gap-4 sm:flex-row sm:space-x-1 mb-4">
                    <div class="flex flex-col gap-2 w-full">
                        <div class="w-full sm:w-1/2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="title">Title</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full form-input text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200" value="<?php echo e(old('title')); ?>" placeholder="Enter field title">
                            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="w-full sm:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="description">Description</label>
                            <textarea name="description" rows="4" id="description" class="mt-1 block w-full form-input text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200" placeholder="Enter description"><?php echo e(old('description')); ?></textarea>
                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="w-full sm:w-1/3">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="amount">Amount</label>
                            <input type="number" name="amount" id="amount" class="mt-1 block w-full form-input text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200" value="<?php echo e(old('amount')); ?>" placeholder="Enter amount">
                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        
                        <div class="w-full">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400" for="image">Image</label>
                            <input type="file" name="image" onchange="previewImage(event)" id="image" class="mt-1 block w-full form-input text-gray-700 dark:text-gray-300 dark:bg-gray-700 rounded-md border-gray-300 dark:border-gray-600 focus:border-purple-500 focus:ring focus:ring-purple-200">
                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        
                        <div class="mt-6">
                            <img id="image-preview" src="#" alt="Selected Image" class="hidden w-[60%] object-contain rounded-md">
                        </div>

                        

                        <script>
                            function previewImage(event) {
                                const input = event.target;
                                const preview = document.getElementById('image-preview');

                                if (input.files && input.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        preview.src = e.target.result;
                                        preview.classList.remove('hidden');
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
                </div>

                <!-- Cancel / Save -->
                <div class="flex justify-end items-center space-x-4">
                    <a href="<?php echo e(route('admin.fields.index')); ?>" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Back
                    </a>
                    <button type="submit" class="px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        Save Field
                    </button>
                </div>

            </form>

        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/fields/create.blade.php ENDPATH**/ ?>