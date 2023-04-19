
<form action="{{!empty($actu)?route ('news.edit' , $actu->id) :route('news.add')}}" method="POST" enctype="multipart/form-data">
    <!-- envoyer des fichiers sur le formulaire !! -->

    @csrf
    <div class="mb-5">
        <label for="titre" class="mb-3 block text-base font-medium text-white"
        >
        Titre
        </label>

        <input  type="text"
                name="titre"
        value="{{!empty($actu)?$actu->name:''}}"
        placeholder="Ajoutez un titre"
        class="w-full rounded-md border border-[#e0e0e0] bg-pink-200 py-3 px-6 text-base font-medium text-black outline-none focus:border-[#6A64F1] focus:shadow-md"
        />
        @error('titre')
        Vous devez saissir un titre 
        @enderror
    </div>

<div class="md-5">
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
    <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    
        <option selected>Choose a category</option>
        @foreach ($categories as $itemCategory)   
        
        @if (!empty($actu) && $itemCategory->id == $actu->category_id)

        <option value="{{$itemCategory->id}}" selected> {{$itemCategory->name}}</option>

        @else
        <option value="{{$itemCategory->id}}"> {{$itemCategory->name}}</option>

        @endif
        
        @endforeach
    </select>

</div>

    <div class="mb-5">
        <label for="image" class="mb-3 block text-base font-medium text-white">
        Image

        </label>
        
        @isset($actu)
        <img
        class="h-20 w-20 object-cover object-center p-2"
        src="{{Storage::url($actu->image)}}"
        alt=""
        /> 
        @endisset
        
        <input  type="file"
                name="image"
        
        placeholder="Saisissez un titre"
        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-[#6A64F1] focus:shadow-md"
        
        />
        @error('image')
        Ajouter une image au bon format 
        @enderror
    </div>


    <div class="mb-5">
        <label
        for="description" class="mb-3 block text-base font-medium text-white"
        >
        Description
        </label>
        <textarea
        rows="4"
        name="description"
        placeholder="Vous devez saisir un texte !"
        class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
        >
        {{!empty($actu)?$actu->description:''}}
    </textarea>

        @error('description')
        Vous devez saissir un texte ! 
        @enderror

    </div>


    
<div class="mb-5">
<button class="bg-pink-300 px-8 py-3 text-black rounded-md font-bold">{{!empty($actu)?'Modifier':'Ajouter'}}</button>
</div>
    </form>
