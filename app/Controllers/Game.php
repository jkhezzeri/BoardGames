<?php

namespace App\Controllers;

class Game extends BaseController {

    public function insert_game() {

        $data = array();

        $request = request();
        
        if ($request->is('post')) {
            $post = $request->getPost();

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('gameRules');

            if ($this->validate($rules)) {

                $game = $this->getGameData($post['name']);

                if ($game == 0) {

                    $data['message'] = 'Le jeu n\'existe pas.';

                } else {

                    $model_game = model('GameModel');
                    $game_id = $model_game->insertGame($game);

                    $model_designer = model('DesignerModel');
                    $model_join_game_designer = model('JoinGameDesignerModel');
                    foreach ($game['designers'] as $designer) {
                        $designer_id = $model_designer->insertDesigner($designer);
                        $model_join_game_designer->insertGameDesigner($game_id, $designer_id);
                    }

                    $model_artist = model('ArtistModel');
                    $model_join_game_artist = model('JoinGameArtistModel');
                    foreach ($game['artists'] as $artist) {
                        $artist_id = $model_artist->insertArtist($artist);
                        $model_join_game_artist->insertGameArtist($game_id, $artist_id);
                    }

                    $model_publisher = model('PublisherModel');
                    $model_join_game_publisher= model('JoinGamePublisherModel');
                    /* foreach ($game['publishers'] as $publisher) { */
                        $publisher_id = $model_publisher->insertPublisher($game['publisher']);
                        $model_join_game_publisher->insertGamePublisher($game_id, $publisher_id);
                    /* } */

                    $model_category = model('CategoryModel');
                    $model_join_game_category = model('JoinGameCategoryModel');
                    foreach ($game['categories'] as $category) {
                        $category_id = $model_category->insertCategory($category);
                        $model_join_game_category->insertGameCategory($game_id, $category_id);
                    }

                    $model_mechanic = model('MechanicModel');
                    $model_join_game_mechanic= model('JoinGameMechanicModel');
                    foreach ($game['mechanics'] as $mechanic) {
                        $mechanic_id = $model_mechanic->insertMechanic($mechanic);
                        $model_join_game_mechanic->insertGameMechanic($game_id, $mechanic_id);
                    }

        
                    $data['message'] = 'Le jeu a été enregistré.';

                }
                
            }
            else {
                $data['message'] = $this->validator->getError('name');
            }

            


            return view('add', $data);


        }


    }




    public function getGameData($post) {

        $url_id = 'https://boardgamegeek.com/xmlapi2/search?query='.$post.'&type=boardgame&exact=1';
        $xml_id = simplexml_load_file($url_id);
        $json_id = json_encode($xml_id);
        $data_id = json_decode($json_id, true);

        if ($data_id['@attributes']['total'] == 0) {
            return 0;
        } else {

            $bgg_id = $data_id['item']['@attributes']['id'];
            /* echo'<pre>';
            print_r($data_id);
            echo'</pre>'; */
    
            $url = 'https://boardgamegeek.com/xmlapi2/thing?id='.$bgg_id;
            $xml = simplexml_load_file($url);
            $json = json_encode($xml);
            $data = json_decode($json, true);
            $game = $data['item'];
    
    
            $name = $game['name'][0]['@attributes']['value'];
            $year = $game['yearpublished']['@attributes']['value'];
            $min_players = $game['minplayers']['@attributes']['value'];
            $max_players = $game['maxplayers']['@attributes']['value'];
            $min_age = $game['minage']['@attributes']['value'];
            $playing_time = $game['playingtime']['@attributes']['value'];
            $description = $game['description'];
            $image = $game['image'];
    
            
            $designers = array();
            $artists = array();
            $publishers = array();
            $categories = array();
            $mechanics = array();
    
            foreach ($game['link'] as $link) {
                // Si c'est une extension
                if (isset($link['@attributes']['inbound'])) {
                    $base_game_name = $link['@attributes']['value'];
                    $model_game = model('GameModel');
                    $base_game_id = $model_game->getIdByName($base_game_name);
                }

                $data_array = ["name" => $link['@attributes']['value'],
                "bgg_id" => $link['@attributes']['id'],
                "slug" => url_title($link['@attributes']['value'], '-', true)];
                switch ($link['@attributes']['type']) {
                    case 'boardgamedesigner':
                        array_push($designers, $data_array);
                        break;
                    case 'boardgameartist':
                        array_push($artists, $data_array);
                        break;
                    case 'boardgamepublisher':
                        array_push($publishers, $data_array);
                        break;
                    case 'boardgamecategory':
                        array_push($categories, $data_array);
                        break;
                    case 'boardgamemechanic':
                        array_push($mechanics, $data_array);
                        break;
                }
            }
            
            /* echo 'Designers : '.implode('/', $designers).'<br>';
            echo 'Artists : '.implode('/', $artists).'<br>';
            echo 'Publishers : '.$publishers[0].'<br>';
            echo 'Categories : '.implode('/', $categories).'<br>';
            echo 'Mechanics : '.implode('/', $mechanics).'<br>'; */
    
    
    
    
            /* echo'<pre>';
            print_r($game);
            echo'</pre>'; */
    
    
            return $game_data = [
                'name' => $name,
                'year' => $year,
                'min_players' => $min_players,
                'max_players' => $max_players,
                'min_age' => $min_age,
                'playing_time' => $playing_time,
                'description' => $description,
                'image' => $image,
                'bgg_id' => $bgg_id,
                'base_game_id' => isset($base_game_id)?$base_game_id:NULL,
                'slug'  => url_title($name, '-', true),
                'designers' => $designers,
                'artists' => $artists,
                'publisher' => $publishers[0],
                'categories' => $categories,
                'mechanics' => $mechanics
            ];

        }

        

    }
}
