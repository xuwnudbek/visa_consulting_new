<?php $__env->startSection('title', 'Fields'); ?>

<?php $__env->startSection('content'); ?>
    <main class="h-full pb-16 overflow-y-auto">

        <div class="container grid px-6 mx-auto my-6">
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
                            <a href="<?php echo e(route('admin.applications.index')); ?>" class="hover:text-purple-600">Fields</a>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between my-6 w-full gap-5">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Fields List
                </h2>

                <a href="<?php echo e(route('admin.fields.create')); ?>" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Add Field
                </a>
            </div>

            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-wrap table-fixed">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="w-1/16 px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Description</th>
                                <th class="px-4 py-3 text-center">Image</th>
                                <th class="px-4 py-3 text-center">Amount</th>
                                <th class="px-4 py-3 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm text-center"><?php echo e($index + 1); ?></td>
                                    <td class="px-4 py-3 text-sm"><?php echo e($field->title); ?></td>
                                    <td class="px-4 py-3 text-sm"><?php echo e($field->description ?? '-'); ?></td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        <?php if($field->image): ?>
                                            <span x-data="{ open: false }" class="block">
                                                <img src="<?php echo e(asset('storage/' . $field->image)); ?>" alt="<?php echo e($field->title); ?>" class="w-24 h-16 object-cover mx-auto cursor-pointer hover:scale-105 transition-transform duration-200" @click="open = true">
                                                <div x-show="open" x-cloak class="fixed inset-0 flex items-center justify-center z-50 bg-black">
                                                    <div class="bg-white rounded shadow-lg p-4 relative max-w-lg w-full">
                                                        <button @click="open = false" class="absolute top-2 right-2 text-gray-600 hover:text-red-500 text-xl">&times;</button>
                                                        <img src="<?php echo e(asset('storage/' . $field->image)); ?>" alt="<?php echo e($field->title); ?>" class="max-w-full max-h-[70vh] mx-auto">
                                                    </div>
                                                </div>
                                            </span>
                                            <script src="//unpkg.com/alpinejs" defer></script>
                                        <?php else: ?>
                                            <span class="text-gray-500">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-center"><?php echo e($field->amount ? number_format($field->amount) : '0.00'); ?>$</td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        <a href="<?php echo e(route('admin.fields.edit', $field)); ?>" class="text-purple-600 hover:underline mr-2">Edit</a>
                                        <form action="<?php echo e(route('admin.fields.destroy', $field)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete this field?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing <?php echo e($fields->firstItem()); ?>-<?php echo e($fields->lastItem()); ?> of <?php echo e($fields->total()); ?>

                    </span>

                    <span class="col-span-2"> </span>

                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <?php echo e($fields->links('pagination::tailwind')); ?>

                    </span>
                </div>
            </div>
        </div>
    </main>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/fields/index.blade.php ENDPATH**/ ?>