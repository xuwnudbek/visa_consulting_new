<?php $__env->startSection('title', 'Edit Client'); ?>

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
                            <a href="<?php echo e(route('admin.clients.index')); ?>" class="hover:text-purple-600">Clients</a>
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
                Edit Client
            </h2>

            <form action="<?php echo e(route('admin.clients.update', $client->id)); ?>" method="POST" class="flex flex-col bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md space-y-6">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <div class="flex gap-4">

                    <div class="flex flex-col w-full gap-4">
                        <!-- Name -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Name</span>
                            <input type="text" name="name" value="<?php echo e(old('name', $client->name)); ?>" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                              dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="e.g. John Doe" />
                        </label>

                        <!-- Email -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input type="email" name="email" value="<?php echo e(old('email', $client->email)); ?>" required class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                              dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="e.g. user@example.com" />
                        </label>

                        <!-- Phone -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Phone</span>
                            <input type="tel" name="phone" value="<?php echo e(old('phone', $client->phone)); ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                              dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="e.g. +998 94 556 6788">
                        </label>

                        <!-- Passport -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Passport</span>
                            <input type="text" name="passport" value="<?php echo e(old('passport', $client->passport)); ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                              dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="e.g. AB1234567">
                        </label>
                    </div>

                    <div class="flex flex-col w-full gap-4">
                        <!-- Birthday -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Birthday</span>
                            <input type="date" name="birthday" value="<?php echo e(old('birthday', $client->birthday)); ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                              dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                        </label>

                        <!-- Role -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Role</span>
                            <select name="role" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                               focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                               dark:text-gray-300 dark:focus:shadow-outline-gray form-select">
                                <option value="client" <?php echo e(old('role', $client->role) == 'client' ? 'selected' : ''); ?>>Client</option>
                                <option value="admin" <?php echo e(old('role', $client->role) == 'admin' ? 'selected' : ''); ?>>Admin</option>
                            </select>
                        </label>

                        <!-- Password -->
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password <span class="text-xs text-gray-400">(Leave blank to keep current)</span></span>
                            <div class="relative">
                                <input type="text" id="password" name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                                  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                                  dark:text-gray-300 dark:focus:shadow-outline-gray form-input pr-10" placeholder="Enter new password" autocomplete="new-password" />
                                <button type="button" onclick="randomizePassword()" class="absolute inset-y-0 right-0 flex items-center px-2 text-gray-400 hover:text-purple-600 focus:outline-none" tabindex="-1" title="Generate random password">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582M20 20v-5h-.581M5 9a7 7 0 0114 0c0 3.866-3.134 7-7 7a7 7 0 01-7-7zm7 7v4m0 0h-4m4 0h4" />
                                    </svg>
                                </button>
                            </div>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-red-500 text-xs"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </label>
                        <script>
                            function randomizePassword() {
                                const chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
                                let password = '';
                                for (let i = 0; i < 12; i++) {
                                    password += chars.charAt(Math.floor(Math.random() * chars.length));
                                }
                                document.getElementById('password').value = password;
                            }
                        </script>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 items-center">
                    <a href="<?php echo e(route('admin.clients.index')); ?>" class="text-sm text-gray-600 dark:text-gray-400 hover:underline">
                        Back
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-purple-600 text-white text-sm font-medium rounded-md shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        </svg>
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/ftpuser/resources/views/admin/clients/edit.blade.php ENDPATH**/ ?>