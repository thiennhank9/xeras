# import api 
from site1.apis import apis as api

feature_api = {
    'hoi_kha_nang_choi_game': api.get_feature_playing_game,
    'hoi_thoi_gian_choi_game': api.get_time_can_play_feature
}