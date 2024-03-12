<?php

$item_tier_rarity = [1, 2, 3, 4, 5, 6, 7, 8]; // 1 = common , 5 = legend
$vip_rank = ['v1', 'v2', 'v3', 'v4', 'v5']; //v1 = lowest rank

function roll_item($rank) {
    global $vip_rank, $item_tier_rarity;
    $rank_index = array_search($rank, $vip_rank) + 1;
    $possible_items = array_slice($item_tier_rarity, 0, $rank_index + 1);
    return $possible_items[array_rand($possible_items)];
}

function item_distribution() {
    global $vip_rank, $item_tier_rarity;
    $distribution_result = [];

    foreach ($vip_rank as $rank) {
        $item_count = array_fill_keys($item_tier_rarity, 0);
        for ($i = 0; $i < 100; $i++) {
            $tier = roll_item($rank);
            $item_count[$tier]++;
        }
        $distribution_result[$rank] = $item_count;
    }

    return $distribution_result;
}

// Testing (adding more item tiers and vip ranks)
print_r(item_distribution());

?>