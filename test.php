<?php
$json = '
{
  "recipe": {
    "publisher": "Closet Cooking",
    "f2f_url": "http://food2fork.com/view/35120",
    "ingredients": ["4 small chicken breasts, pounded thin", "salt and pepper to taste", "4 jalapenos, diced", "4 ounces cream cheese, room temperature", "1 cup cheddar cheese, shredded", "8 slices bacon\n"],
    "source_url": "http://www.closetcooking.com/2012/11/bacon-wrapped-jalapeno-popper-stuffed.html",
    "recipe_id": "35120",
    "image_url": "http://static.food2fork.com/Bacon2BWrapped2BJalapeno2BPopper2BStuffed2BChicken2B5002B5909939b0e65.jpg",
    "social_rank": 100.0,
    "publisher_url": "http://closetcooking.com",
    "title": "Bacon Wrapped Jalapeno Popper Stuffed Chicken"
  }
}';

$decoded = json_decode($json, true);
echo $decoded['recipe']['publisher'];

?>
