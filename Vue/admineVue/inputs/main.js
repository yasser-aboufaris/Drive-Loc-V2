const dynamicButton = document.getElementById("addField");
const form = document.getElementById("adding");
let fieldNum = 0;
let i = 0;
const addField = () => {
    i++;
    const newField = `
    <hr class="my-4">
    <div class="field-${i}">
        <div>
            <label for="carModel-${i}" class="block text-sm font-medium text-gray-700 mb-1">Car Model</label>
            <input type="text" id="carModel-${i}" name="carModel[${i}]"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                placeholder="Enter the car model" />
        </div>
        <div>
            <label for="description-${i}" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description-${i}" name="description[${i}]"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                rows="3" placeholder="Enter a description of the car"></textarea>
        </div>
        <div>
            <label for="imageUrl-${i}" class="block text-sm font-medium text-gray-700 mb-1">Image URL</label>
            <input type="url" id="imageUrl-${i}" name="imageUrl[${i}]"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                placeholder="Enter the image URL" />
        </div>
        <div>
            <label for="price-${i}" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
            <input type="number" id="price-${i}" name="price[${i}]"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 placeholder-gray-400"
                placeholder="Enter the price" />
        </div>
        
    </div>`;
    form.insertAdjacentHTML("beforeend", newField);
};



        
dynamicButton.addEventListener("click", addField);
