<?php $__env->startSection('title', 'Applications'); ?>

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
                            <a href="<?php echo e(route('admin.applications.index')); ?>" class="hover:text-purple-600">Applications</a>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between my-6 w-full gap-4">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Users Applications
                </h2>
                <div class="flex items-center w-full sm:w-auto gap-2 flex-col sm:flex-row">
                    <div class="relative min-w-32 max-w-xl w-full sm:w-auto focus-within:text-purple-500">
                        <div class="absolute inset-y-0 flex items-center pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" id="search" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" placeholder="Search for clients" aria-label="Search" />

                        <script>
                            document.getElementById('search').addEventListener('input', function() {
                                const searchTerm = this.value.toLowerCase();
                                const rows = document.querySelectorAll('tbody tr');

                                rows.forEach(row => {
                                    const nameCell = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                                    const fieldCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                    const countryCell = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                                    const statusCell = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                                    if (nameCell.includes(searchTerm) || fieldCell.includes(searchTerm) || countryCell.includes(searchTerm) || statusCell.includes(searchTerm)) {
                                        row.style.display = '';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            });
                        </script>
                    </div>

                    <a href="<?php echo e(route('admin.applications.create')); ?>" class="flex w-full sm:w-auto justify-center items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="w-auto">Add Application</span>
                    </a>

                    <a href="<?php echo e(route('admin.import')); ?>" class="flex w-full sm:w-auto justify-center items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="w-auto">Import</span>
                    </a>
                </div>
            </div>
            
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="w-1/16 px-4 py-3 text-center">ID</th>
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3 text-center">Field</th>
                                <th class="px-4 py-3 text-center">Country</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="text-gray-700 dark:text-gray-400">
                                    
                                    <td class="px-4 py-3 text-sm text-center">
                                        <span class="font-semibold"><?php echo e($index + 1); ?></span>
                                    </td>
                                    
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div>
                                                <p class="font-semibold"><?php echo e($application->user->name); ?></p>
                                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                                    <?php echo e($application->user->email); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <td class="px-4 py-3 text-sm text-center">
                                        <?php echo e($application->field->title); ?>

                                    </td>
                                    
                                    <td class="px-4 py-3 text-sm text-center">
                                        <?php echo e($application->country->name); ?>

                                    </td>

                                    
                                    <td class="px-4 py-3 text-xs text-center">
                                        <?php
                                            $statusClasses = [
                                                'pending' => 'text-yellow-800 bg-yellow-200 dark:bg-yellow-700 dark:text-yellow-100',
                                                'approved' => 'text-emerald-800 bg-emerald-200 dark:bg-emerald-700 dark:text-emerald-100',
                                                'rejected' => 'text-rose-800 bg-rose-200 dark:bg-rose-700 dark:text-rose-100',
                                            ];
                                            $statusClass = $statusClasses[$application->status] ?? 'text-gray-700 bg-gray-100';

                                        ?>
                                        <span class="px-2 py-1 font-semibold leading-tight <?php echo e($statusClass); ?> rounded-full">
                                            <?php echo e($application->status); ?>

                                        </span>
                                    </td>

                                    <td class="px-4 py-3 flex justify-center gap-1">
                                        <a href="<?php echo e(route('admin.applications.show', $application)); ?>" class="flex items-center text-blue-600 hover:underline mr-2">
                                            Show
                                        </a>
                                        <a href="<?php echo e(route('admin.applications.edit', $application)); ?>" class="flex items-center text-purple-600 hover:underline mr-2">
                                            Edit
                                        </a>
                                        <form action="<?php echo e(route('admin.applications.destroy', $application)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?');">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="flex items-center text-red-600 hover:underline">
                                                Delete
                                            </button>
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
                        Showing <?php echo e($applications->firstItem()); ?>-<?php echo e($applications->lastItem()); ?> of <?php echo e($applications->total()); ?>

                    </span>

                    <span class="col-span-2"> </span>

                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <?php echo e($applications->links('pagination::tailwind')); ?>

                    </span>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/applications/index.blade.php ENDPATH**/ ?>