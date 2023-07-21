<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<style>
  input[type=range]::-webkit-slider-thumb {
	pointer-events: all;
	width: 24px;
	height: 24px;
	-webkit-appearance: none;
  /* @apply w-6 h-6 appearance-none pointer-events-auto; */
  }
</style> 
  <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
    <div>
      <input type="range"
             step="100"
             x-bind:min="min" x-bind:max="max"
             x-on:input="mintrigger"
             x-model="minprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <input type="range" 
             step="100"
             x-bind:min="min" x-bind:max="max"
             x-on:input="maxtrigger"
             x-model="maxprice"
             class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

      <div class="relative z-10 h-1">

        <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

        <div class="absolute z-20 top-0 bottom-0 rounded-md bg-primary" x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

        <div class="absolute z-30 w-4 h-4 top-0.5 left-0 bg-primary rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>

        <div class="absolute z-30 w-4 h-4 top-0.5 right-0 bg-primary rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>
 
      </div>

    </div>
    
    <div class="flex justify-between items-center py-5">
      <div>
        <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
      </div>
      <div>
        <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="px-3 py-2 border border-gray-200 rounded w-24 text-center">
      </div>
    </div>

<script>
    function range() {
        return {
          minprice: 1000, 
          maxprice: 7000,
          min: 500, 
          max: 10000,
          minthumb: 0,
          maxthumb: 0, 
          
          mintrigger() {   
            this.minprice = Math.min(this.minprice, this.maxprice - 500);      
            this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
          },
           
          maxtrigger() {
            this.maxprice = Math.max(this.maxprice, this.minprice + 500); 
            this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);    
          }, 
        }
    }
</script>
</div>