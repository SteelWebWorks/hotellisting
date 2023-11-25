<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Holtel Offers Listing</title>
    <meta name="description" content="One small application to show hotels' offers">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="<?=base_url('js/app.js')?>"></script>
</head>
<body class="bg-slate-900">
    <div class="max-w-6xl mx-auto my-2 py-2">
    <form method="GET" action="/">
                <div class="flex flex-row items-center">
                <label for="search" class="text-sm font-medium text-gray-900 sr-only">Search</label>
                <div class="relative basis-3/6">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input name="search" type="search" id="search" class="block w-full p-4 ps-10 text-sm border rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search countries, cities...">
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Search</button>
                </div>
                <div class="basis-1/6 px-1">
                    <button type="submit" name="order_by_country" value="ASC" class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 flex flex-row justify-center items-center"><span>Countries</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mt-1">
                            <path fill-rule="evenodd" d="M14.77 4.21a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 011.08-1.04L10 8.168l3.71-3.938a.75.75 0 011.06-.02zm0 6a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 111.08-1.04L10 14.168l3.71-3.938a.75.75 0 011.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="basis-1/6 px-1">
                    <button type="submit" name="order_by_city" value="ASC" class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 flex flex-row justify-center items-center"><span>Cities</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mt-1">
                            <path fill-rule="evenodd" d="M14.77 4.21a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 011.08-1.04L10 8.168l3.71-3.938a.75.75 0 011.06-.02zm0 6a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 111.08-1.04L10 14.168l3.71-3.938a.75.75 0 011.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="basis-1/6 px-1">
                    <button type="submit" name="order_by_price" value="ASC" class="w-full text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 bg-blue-600 hover:bg-blue-700 focus:ring-blue-800 flex flex-row justify-center items-center"><span>Price</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mt-1">
                            <path fill-rule="evenodd" d="M14.77 4.21a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 011.08-1.04L10 8.168l3.71-3.938a.75.75 0 011.06-.02zm0 6a.75.75 0 01.02 1.06l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 111.08-1.04L10 14.168l3.71-3.938a.75.75 0 011.06-.02z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                </div>
            </form>
    </div>
    <div class="mx-auto max-w-6xl">
        <?php foreach ($offers as $offer) {?>
            <div class="flex flex-row w-full mt-1 p-2 border border-gray-500 bg-slate-600 rounded-lg text-gray-300">
            <div class="basis-1/4">
                <div class="w-full">
                    <div class="flex justify-center items-center">
                        <img class="h-48 lazyload rounded-lg" data-src="<?=$offer['offerImage']?>" src=""
                            alt="<?=$offer['hotel_name']?> <?=$offer['country']?> <?=$offer['city']?>">
                    </div>
                </div>
                </div>
                <div class="basis-1/2">
                    <div class="flex flex-col w-full h-full justify-center items-center">
                        <span class="text-xl"><?=$offer['hotel_name']?></span>
                        <span class="text-xl"><?=$offer['country']?> - <?=$offer['city']?></span>
                        <div class="flex flex-row">
                        <?php for ($i = 1; $i <= $offer['star']; $i++) {?>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="yellow" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        <?php }?>
                        </div>
                    </div>
                </div>
                <div class="basis-1/4">
                    <div class="h-full flex items-center justify-center">
                        <span class="text-xl"><?=$offer['price']?>€ / night</span>
                    </div>
                </div>
            </div>
        <?php }?>

    </div>
    <?=$pager->links()?>
</body>
</html>
