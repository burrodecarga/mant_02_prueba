function find_max(nums) {
    2 let max_num = Number.NEGATIVE_INFINITY; // smaller than all other numbers
    3 for (let num of nums) {
    4 if (num > max_num) {
    5  max_num=num // (Fill in the missing line here)
    6 }
    7 }
    8 return max_num;
    9 }
    //Can you answer this correctly?
