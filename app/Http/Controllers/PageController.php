<?php

namespace App\Http\Controllers;
use App\ContentItem;
use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class PageController extends Controller
{

    /**
     * @var DeliveryClient
     */
    private $client;

    public function __construct(DeliveryClient $client) {
        $this->client = $client;
    }

    public function entryById($id) {
        $entry = $this->client->getEntry($id);
        if (!$entry) {
            abort(404);
        }
        return $entry;
    }

    public function getArticle($slug) {
        $query = (new \Contentful\Delivery\Query());
        $query->setContentType('settings')
            ->where('fields.slug', 'Default');
        $defaults = $this->client->getEntries($query);
        if (!empty($defaults->getItems())) {
            $defaults = $defaults->getItems()[0];
        } else {
            $defaults = NULL;
        }
        $query2 = (new \Contentful\Delivery\Query())
            ->setInclude(2)
            ->setContentType('page')
            ->where('fields.slug', $slug);
        $pages = $this->client->getEntries($query2);
        if (empty($pages->getItems())) {
            abort(404);
        }
        $page = $pages[0];
        $campaign = $page->getCampaign();
        $pageJson = json_decode(json_encode($page));

        $space = $pageJson->sys->space->sys->id;
        $uid = $pageJson->sys->id;
        $version = $pageJson->sys->revision;
        $search = new ContentItem();
        $contentItem = $search->getContentItemAnalysis($page, $space, $uid, $version);
        return view('welcome')->with('page', $page)->with('defaults', $defaults)->with('analyticsCategory', 'article')->with('campaign', $campaign)->with('contentItem', $contentItem);
    }

    public function getArticles($slug = NULL) {
        if($slug == NULL) {
            $slug = 'page';
        }
        $query = (new \Contentful\Delivery\Query());
        $query->setContentType($slug)
            ->setInclude(2);
        $articles = $this->client->getEntries($query);
        $query2 = (new \Contentful\Delivery\Query());
        $query2->setContentType('settings')
            ->where('fields.slug', 'Default');
        $defaults = $this->client->getEntries($query2);
        if(!empty($defaults->getItems())) { $defaults = $defaults->getItems()[0]; } else { $defaults = NULL; }
        return view('pages.index')->with('articles', $articles)->with('defaults', $defaults)->with('analyticsCategory', 'articles');
    }

    public function getHomepage() {

        $query = (new \Contentful\Delivery\Query());
        $query->setContentType('settings')
            ->where('fields.slug', 'Default');
        $defaults = $this->client->getEntries($query);
        if (empty($defaults->getItems())) {
            abort(404);
        }
        $homepage = $defaults[0]->getHomepage();
        if (!empty($defaults->getItems())) {
            $defaults = $defaults->getItems()[0];
        } else {
            $defaults = NULL;
        }
        return view('welcome')->with('page', $homepage)->with('defaults', $defaults)->with('analyticsCategory', 'homepage');

    }
}