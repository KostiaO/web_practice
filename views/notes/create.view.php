<?php require base_path("views/partials/head.php") ?>
<?php require base_path("views/partials/banner.php") ?>
<?php require base_path("views/partials/nav.php") ?>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <form
            method="POST"
        >
        <div class="space-y-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                <label for="about" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                <div class="mt-2">
                    <textarea id="title" name="title" rows="1" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    <?php if (isset($errors) && !empty($errors)) : ?>
                        <p class="text-red-500 text-xs mt-2"><?= $errors["title"] ?></p>
                    <?php endif; ?>
                </div>
                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center">
                        Create
                    </button>
                </div>
                </div> 
        </form>

        </div>
    </main>
<?php require base_path("views/partials/footer.php") ?>
