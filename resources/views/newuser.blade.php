<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="antialiased bg-gray-100 text-gray-600 h-screen px-4" x-data="app">
        @if ( Session::has('isErrorOccured') )
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                <p class="font-bold">Error!</p>
                <p>Error when add new user!</p>
            </div>
        @endif
        <div class="flex flex-col justify-center h-full">
            <!-- Table -->
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-sm border border-gray-200">
                <header class="px-5 py-4 border-b border-gray-100">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-1">
                            <div class="col-span-1 font-semibold text-gray-800 font-bold">New User</div>
                        </div>
                        <div class="col-span-1 flex flex-row-reverse">
                            <button form="userForm" type="submit" class="col-span-1 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">
                                Add User
                            </button>
                        </div>
                    </div>
                </header>
                <div class="overflow-x-auto p-4">
                    <form id="userForm" method="POST" action="/users">
                        @csrf
                        <div class="form-group mb-6">
                          <label class="form-label inline-block mb-2 text-gray-700">First Name</label>
                          <input type="text" required name="fName" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Enter First Name">
                        </div>
                        <div class="form-group mb-6">
                          <label class="form-label inline-block mb-2 text-gray-700">Last Name</label>
                          <input type="text" required name="lName" class="form-control block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            placeholder="Enter Last Name">
                        </div>
                      </form>
                </div>
                <div class="flex justify-end">
                    <!-- send this data to backend (note: use class 'hidden' to hide this input) -->
                    <input type="hidden" class="border border-black bg-gray-50" x-model="selected" />
                </div>
            </div>
        </div>
    </section>
</body>
</html>