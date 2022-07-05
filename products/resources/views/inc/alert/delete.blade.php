<div class="bg-[rgba(0,0,0,0.5)] w-full min-h-screen flex justify-center items-center fixed top-0 left-0 z-10 alert-modal duration-700 ease-in-out scale-0" id="">
    <div class="bg-white px-20 py-12 h-fit relative">
        <header class="mt-5">
            <h1 class="text-2xl text-slate-600 text-center mb-5 font-bold">Delete Record</h1>
            <i class="fa-solid fa-triangle-exclamation text-[3rem] text-center text-yellow-400 flex justify-center mb-4"></i>
            <p class="text-slate-500">Are you sure you want to delete this record?</p>
            <p class="text-slate-500">You can't revert this changes.</p>
        </header>

        <div class="cta mt-7 flex space-x-1 text-lg">
            <a href="#" class="confirm-btn p-4 flex flex-1 bg-red-500 text-white font-medium hover-bg items-center justify-center text-center hover:bg-red-300 duration-300">
                <span>Yes</span>
            </a>
            <button class="cancel-btn p-4 flex flex-1 bg-slate-300 text-slate-400 font-medium items-center justify-center hover:bg-slate-400 hover:text-white duration-300 text-center">Cancel</button>
        </div>

        <button class="absolute h-8 w-8 right-10 top-6 rounded-full border  text-base fa-solid fa-xmark hover:bg-slate-50 close-modal"></button>

    </div>
</div>