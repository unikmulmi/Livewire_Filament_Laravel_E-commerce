<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <section class="overflow-hidden bg-white py-12 font-poppins dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 md:px-6">
      <div class="flex flex-col lg:flex-row gap-12 lg:gap-16">

        <!-- Images Section -->
        <div class="lg:w-5/12" x-data="{ mainImage: '{{ url('storage', $product->images[0]) }}' }">
          <div class="sticky top-8">
            <!-- Main Image - Controlled size -->
            <div class="relative bg-white dark:bg-gray-900 rounded-3xl overflow-hidden shadow-sm border border-gray-100 dark:border-gray-700 mb-10 max-h-[520px]">
              <img 
                x-bind:src="mainImage" 
                alt="{{ $product->name }}" 
                class="w-full h-auto max-h-[480px] object-contain mx-auto p-6">
            </div>

            <!-- Thumbnails -->
            <div class="grid grid-cols-4 gap-4 mb-12">
              @foreach ($product->images as $image)
                <div 
                  x-on:click="mainImage = '{{ url('storage', $image) }}'" 
                  class="cursor-pointer rounded-2xl overflow-hidden border-2 border-transparent hover:border-blue-500 transition-all duration-200">
                  <img 
                    src="{{ url('storage', $image) }}" 
                    alt="{{ $product->name }}" 
                    class="w-full h-20 object-cover">
                </div>
              @endforeach
            </div>

            <!-- Free Shipping -->
            <div class="flex items-center gap-3 text-gray-700 dark:text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
              </svg>
              <span class="text-lg font-semibold">Free Shipping</span>
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="lg:w-7/12">
          <div class="lg:pl-12">
            <div class="mb-10 space-y-6">
              <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-gray-100">
                {{ $product->name }}
              </h1>

              <div>
                <span class="text-4xl font-bold text-gray-900 dark:text-white">
                  {{ Number::currency($product->price , 'NRS') }}
                </span>
              </div>

              <div class="text-gray-700 dark:text-gray-300 leading-relaxed [&>ul]:list-disc [&>ul]:pl-6 [&>ul]:space-y-2">
                {!! Str::markdown($product->description) !!}
              </div>
            </div>

            <div class="w-32 mb-10">
              <label class="block pb-2 text-xl font-semibold text-gray-700 dark:text-gray-400 border-b border-blue-300 dark:border-gray-600">Quantity</label>
              <div class="relative flex flex-row w-full h-10 mt-6 bg-transparent rounded-lg">
                <button wire:click = "decreaseQty" class="w-20 h-full text-gray-600 bg-gray-300 rounded-l outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 hover:text-gray-700 dark:bg-gray-900 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">-</span>
                </button>
                <input type="number" wire:model = "quantity" readonly class="flex items-center w-full font-semibold text-center text-gray-700 placeholder-gray-700 bg-gray-300 outline-none dark:text-gray-400 dark:placeholder-gray-400 dark:bg-gray-900 focus:outline-none text-md hover:text-black" placeholder="1">
                <button wire:click = "increaseQty" class="w-20 h-full text-gray-600 bg-gray-300 rounded-r outline-none cursor-pointer dark:hover:bg-gray-700 dark:text-gray-400 dark:bg-gray-900 hover:text-gray-700 hover:bg-gray-400">
                  <span class="m-auto text-2xl font-thin">+</span>
                </button>
              </div>
            </div>

            <button wire:click = 'addToCart({{ $product->id }})' class="w-full lg:w-auto px-12 py-4 bg-blue-500 hover:bg-blue-600 text-white font-medium text-lg rounded-2xl transition-colors cursor-pointer">
              <span wire:loading.remove wire:target="addToCart">Add to cart</span> <span wire:loading wire:target="addToCart">Adding...</span>
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>