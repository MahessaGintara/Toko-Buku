<div class="container py-12 mx-auto ">
        <div class="max-w-7x1 sm:px-6 lg:px-8">
            <div class="bg-white sm:rounded-lg">
                <div class="p-2 sm:p-4 sm:flex sm:flex-row-reverse sm:justify-between">
                    {{-- <div class="mb-2 flex justify-end relative sm:w-1/4 max-w-md">
                        <input wire:model="search" class="border-2 border-primary bg-red transition h-12 px-5 pr-12 rounded-md focus:outline-none w-full text-black text-lg " type="search" name="search" placeholder="Search" />
                        <button wire:click="search_query" type="submit" class="absolute right-2 top-3 mr-2">
                            <svg class="text-black h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                            <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                            </svg>
                        </button>
                    </div> --}}
                    <button wire:click="open_modal" class="mb-2 px-2 py-1 sm:p-2 sm:px-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg border-indigo-300">Tambah</button>
                </div>
                <div class="flex flex-wrap justify-center">

                    @foreach ($books as $book)
                        <div class="mx-2 mb-2 sm:mx-4 sm:mb-4 w-32 sm:w-72 bg-white group relative rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transform duration-200">
                            <div class="relative sm:w-full h-36 md:h-96 lg:h-44">
                                <img src="storage/{{$book->gambar}}"
                                    alt="storage/{{$book->gambar}}"
                                    class="w-full h-full object-center object-cover">
                            </div>
                            <div class="px-2 pt-2 sm:px-3 sm:py-3">
                                <p
                                    class="text-xs sm:text-lg font-semibold text-gray-900 group-hover:text-indigo-600"
                                >
                                    {{$book->judul}}
                                </p>
                            </div>
                            <h3 class="p-2 rounded text-sm group-hover:text-indigo-600"  >Stok {{$book->persediaan}}</h3>
                            <div class="my-3 sm:pr-4 flex justify-around sm:justify-end">
                                <button wire:click="get_edit({{$book->id}})" class="sm:mr-3 py-1 px-1 sm:py-2 sm:px-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-xs rounded sm:rounded-lg sm:text-lg border-indigo-300">Edit</button>
                                <button wire:click='open_delete_modal({{$book->id}})' class=" px-1 sm:py-2 sm:px-5 transition-colors duration-700 transform bg-red-500 hover:bg-red-400 text-gray-100 text-xs rounded sm:rounded-lg sm:text-lg border-red-300">Delete</button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        {{-- Modal --}}
        @if ($is_modal_open)
        <form >
            <div class=" absolute min-w-screen h-screen animated fadeIn faster  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"   id="modal-id">

            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
              <!--content-->
              <div class="">
                <!--body-->
                <div class="w-full p-4">
                        <h3>Tambah Buku</h3>
                </div>

                <div>
                    <div class="mb-6">
                        <label for="Judul" class="text-sm font-medium text-gray-900 block mb-2">Judul</label>
                        <input wire:model="judul" type="text" id="Judul" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="">
                    </div>
                        <div class="mb-6">
                            <label for="gambar" class="text-sm font-medium text-gray-900 block mb-2">Gambar</label>
                            <input wire:model="gambar" type="file" id="gambar" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="" accept="image/*">
                        </div>
                    <div class="mb-6">
                        <label for="Persediaan" class="text-sm font-medium text-gray-900 block mb-2">Persediaan</label>
                        <input wire:model="persediaan" type="number" id="Persediaan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="" placeholder="Masukan Angka">
                    </div>
                    <div class="mb-6">
                        <label for="Pengarang" class="text-sm font-medium text-gray-900 block mb-2">Pengarang</label>
                        <input wire:model="pengarang" type="text" id="Pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="">
                    </div>
                    <div class="mb-6">
                        <label for="Penerbit" class="text-sm font-medium text-gray-900 block mb-2">Penerbit</label>
                        <input wire:model="penerbit" type="text" id="Penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="" >
                    </div>
                </div>
                <!--footer-->
                <div class="p-3  mt-2 text-center space-x-4 md:block">
                    <button wire:click="close_modal" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button wire:click="store" type="submit" class="mb-2 md:mb-0 bg-blue-500 border border-blue-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-600">Kirim</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        @endif

        @if ($is_edit_modal)
        <form >
            <div class=" absolute min-w-screen h-screen animated fadeIn faster  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"   id="modal-id">

            <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
              <!--content-->
              <div class="">
                <!--body-->
                <div class="w-full p-4">
                        <h3>Edit Buku</h3>
                </div>

                <div>
                    <div class="mb-6">
                        <label for="Judul" class="text-sm font-medium text-gray-900 block mb-2">Judul</label>
                        <input wire:model="judul" type="text" id="Judul" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="">
                    </div>
                    <img src="storage/{{$gambar}}" alt="">
                    <div class="mb-6">
                        <label for="Persediaan" class="text-sm font-medium text-gray-900 block mb-2">Persediaan</label>
                        <input wire:model="persediaan" type="number" id="Persediaan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="" placeholder="Masukan Angka">
                    </div>
                    <div class="mb-6">
                        <label for="Pengarang" class="text-sm font-medium text-gray-900 block mb-2">Pengarang</label>
                        <input wire:model="pengarang" type="text" id="Pengarang" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="">
                    </div>
                    <div class="mb-6">
                        <label for="Penerbit" class="text-sm font-medium text-gray-900 block mb-2">Penerbit</label>
                        <input wire:model="penerbit" type="text" id="Penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3" required="" >
                    </div>
                </div>
                <!--footer-->
                <div class="p-3  mt-2 text-center space-x-4 md:block">
                    <button wire:click="close_modal" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                        Cancel
                    </button>
                    <button wire:click="edit" type="submit" class="mb-2 md:mb-0 bg-blue-500 border border-blue-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-blue-600">Kirim</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        @endif

        @if ($is_delete_modal)
        <!-- component -->
<div class="min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover"  id="modal-id">
   	<div class="absolute bg-black opacity-80 inset-0 z-0"></div>
    <div class="w-full  max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
      <!--content-->
      <div class="">
        <!--body-->
        <div class="text-center p-5 flex-auto justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
</svg>
                        <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                        <p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                This process cannot be undone</p>
        </div>
        <!--footer-->
        <div class="p-3  mt-2 text-center space-x-4 md:block">
            <button wire:click="close_modal" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                Cancel
            </button>
            <button wire:click="_delete" class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Delete</button>
        </div>
      </div>
    </div>
  </div>
        @endif

    </div>

