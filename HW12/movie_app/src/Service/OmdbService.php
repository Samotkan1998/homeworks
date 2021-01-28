<?php


namespace App\Service;


use App\Dto\MovieDto;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use \Datetime;

class OmdbService implements OmdbServiceInterface
{
    private $client;
    private $apiKey;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->apiKey = $parameterBag->get('omdbApiKey');
        $this->client = new Client([
            'base_uri' => 'http://www.omdbapi.com'
        ]);
    }

    /**
     * Find film by ID.
     *
     * @param int $id
     * @return array
     */
    public function findById(string $id): ?MovieDto
    {
        $request = $this->client->request('GET', '/', [
            'query' => [
                'i' => $id,
                'apikey' => $this->apiKey
            ]
        ]);

        $content = json_decode($request->getBody()->getContents(), true);
        $content = $this->ensureResponseOk($content);
        return $this->toDto($content);
    }

    /**
     * Find film by title.
     *
     * @param string $title
     * @return array
     */
    public function findSingleByTitle(string $title): ?MovieDto
    {
        $request = $this->client->request('GET', '/', [
            'query' => [
                't' => $title,
                'apikey' => $this->apiKey
            ]
        ]);

        $content = json_decode($request->getBody()->getContents(), true);
        $content = $this->ensureResponseOk($content);
        return $this->toDto($content);
    }

    /**
     * Find films by title.
     *
     * @param string $title
     * @return array
     */
    public function findByTitle(string $title): Array
    {
        $request = $this->client->request('GET', '/', [
            'query' => [
                's' => $title,
                'apikey' => $this->apiKey
            ]
        ]);

        $content = json_decode($request->getBody()->getContents(), true);
        $content = $this->ensureResponseOk($content);
        $res = [];
        if($content) {
            for($i = 0; $i < count($content['Search']); $i++) {
                $temp = $this->toDto($content['Search'][$i]);
                array_push($res, $temp);
            }
        }
        return $res;
    }

    /**
     * Check that no errors found.
     *
     * @param array $content
     * @return array|null
     */
    private function ensureResponseOk(array $content): ?array
    {
        return (array_key_exists('Error', $content)) ? null : $content;
    }

    private function toDto(array $content): MovieDto
    {
        $movieDto = new MovieDto();
        $movieDto->title = $content['Title'];
        $movieDto->year = intval($content['Year']);
        $movieDto->poster = $content['Poster'];
        $movieDto->imdbId = $content['imdbID'];
        $movieDto->type = $content['Type'];
        return $movieDto;
    }
}
