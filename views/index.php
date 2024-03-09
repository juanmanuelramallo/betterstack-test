<header class="bg-white">
  <h1 class="font-semibold py-4">PHP Test Application</h1>
</header>

<main class="flex flex-col gap-8">
  <table class="min-w-full divide-y divide-gray-300">
    <thead>
      <tr>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">E-mail</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">City</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-200">
      <?php foreach($users as $user){?>
      <tr class="even:bg-gray-50">
        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"><?=$user->getName()?></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?=$user->getEmail()?></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?=$user->getCity()?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>

  <form method="post" action="create.php">
    <div class="flex flex-row gap-2">
      <div class="flex-grow grid grid-cols-1 md:grid-cols-3 gap-2">
        <input
          class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
          name="name"
          input="text"
          id="name"
          required="required"
          placeholder="Name"/>
        <input
          class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
          name="email"
          input="text"
          id="email"
          required="required"
          placeholder="Email"/>
        <input
          class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
          name="city"
          input="text"
          id="city"
          required="required"
          placeholder="City"/>
      </div>

      <button class="inline-flex gap-1 justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <span class="my-auto">Create new row</span>
      </button>
    </div>
  </form>
</main>
