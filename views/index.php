<header class="bg-white">
<h1 class="font-semibold py-4">PHP Test Application <?=$ajax ? 'with ajax' : ''?></h1>
</header>

<main class="flex flex-col gap-8 pb-10">
  <div class="flex flex-col gap-1">
    <div class="relative">
      <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-2 text-gray-600">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>
      </div>
      <input
        class="block pl-10 w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
        type="search"
        placeholder="Find by city"
        id="find_by_city"
        onchange="handleSearch(this.value)">
    </div>
  </div>
  <table class="min-w-full divide-y divide-gray-300">
    <thead>
      <tr>
        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">Name</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">E-mail</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">City</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      <?php foreach($users as $user){?>
      <tr class="odd:bg-gray-50">
        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900"><?=$user->getName()?></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?=$user->getEmail()?></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500" data-search="city" data-search-value="<?=$user->getCity()?>"><?=$user->getCity()?></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><?=$user->getPhone()?></td>
      </tr>
      <?php }?>
    </tbody>
  </table>

  <form method="post"
    id="create_user"
    action="create.php"
    <?php if($ajax){?>
      data-ajax="true"
    <?php }?>
  >
    <div class="flex flex-row gap-2">
      <div class="flex-grow grid grid-cols-1 md:grid-cols-4 gap-2">
        <div class="flex flex-col gap-1">
          <input
            class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
            name="name"
            input="text"
            id="name"
            <?php if(isset($fields['name'])){?>
              value="<?=$fields['name']?>"
            <?php }?>
            placeholder="Name"/>
          <?php if(isset($errors['name'])){?>
            <p class="text-red-600 text-xs"><?=$errors['name']?></p>
          <?php }?>
        </div>
        <div class="flex flex-col gap-1">
          <input
            class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
            name="email"
            input="email"
            id="email"
            <?php if(isset($fields['email'])){?>
              value="<?=$fields['email']?>"
            <?php }?>
            placeholder="Email"/>
          <?php if(isset($errors['email'])){?>
            <p class="text-red-600 text-xs"><?=$errors['email']?></p>
          <?php }?>
        </div>
        <div class="flex flex-col gap-1">
          <input
            class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
            name="city"
            input="text"
            id="city"
            <?php if(isset($fields['city'])){?>
              value="<?=$fields['city']?>"
            <?php }?>
            placeholder="City"/>
          <?php if(isset($errors['city'])){?>
            <p class="text-red-600 text-xs"><?=$errors['city']?></p>
          <?php }?>
        </div>
        <div class="flex flex-col gap-1">
          <input
            class="w-full border-none rounded-md ring-1 ring-gray-200 focus:ring-2"
            name="phone"
            input="phone"
            id="phone"
            <?php if(isset($fields['phone'])){?>
              value="<?=$fields['phone']?>"
            <?php }?>
            placeholder="Phone"/>
          <?php if(isset($errors['phone'])){?>
            <p class="text-red-600 text-xs"><?=$errors['phone']?></p>
          <?php }?>
        </div>
      </div>

      <button class="inline-flex gap-1 justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 h-10">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        <span class="my-auto">Create</span>
      </button>
    </div>
  </form>
</main>
