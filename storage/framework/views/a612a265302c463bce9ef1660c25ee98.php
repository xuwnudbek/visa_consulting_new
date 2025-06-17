<?php $__env->startSection('title', 'Import Applications'); ?>

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
                    Import Applications
                </h2>
                <div class="flex items-center w-full sm:w-auto gap-2 flex-col sm:flex-row">
                    <div class="relative min-w-32 max-w-[400px] w-full sm:w-auto focus-within:text-purple-500">
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
                                    const nameCell = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                                    const fieldName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                                    const countryCell = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                                    const passportCell = row.querySelector('td:nth-child(5)').textContent.toLowerCase();

                                    if (nameCell.includes(searchTerm) || fieldName.includes(searchTerm) || countryCell.includes(searchTerm) || passportCell.includes(searchTerm)) {
                                        row.style.display = '';
                                    } else {
                                        row.style.display = 'none';
                                    }
                                });
                            });
                        </script>

                    </div>
                    
                    
                </div>
            </div>

            
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Client</th>
                                <th class="px-4 py-3 text-center">Field</th>
                                <th class="px-4 py-3 text-center">Country</th>
                                <th class="px-4 py-3 text-center">Passport</th>
                                <th class="px-4 py-3 text-center">Birthday</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y text-white dark:divide-gray-700 dark:bg-gray-800">
                            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-3"><?php echo e($loop->index + 1); ?></td>
                                    <td class="px-4 py-3"><?php echo e($record['name'] ?? 'No Name'); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($record['field'] ?? 'No Field'); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($record['country'] ?? 'No Country'); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($record['passport'] ?? 'No Passport'); ?></td>
                                    <td class="px-4 py-3 text-center"><?php echo e($record['birthday'] ?? 'No Birthday'); ?></td>
                                    <td class="px-4 py-3 text-center">Action</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

                
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/applications/import.blade.php ENDPATH**/ ?>