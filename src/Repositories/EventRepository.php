<?php

namespace Casa\Repositories;

use Carbon\Carbon;
use Casa\Models\Calendar\Event;
use Siravel\Repositories\CmsRepository;
use Siravel\Repositories\TranslationRepository;

class EventRepository extends CmsRepository
{
    public $model;

    public $translationRepo;

    public $table;

    public function __construct(Event $model, TranslationRepository $translationRepo)
    {
        $this->model = $model;
        $this->translationRepo = $translationRepo;
        $this->table = \Illuminate\Support\Facades\Config::get('siravel.db-prefix').'events';
    }

    /**
     * Returns all published Events.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findEventsByDate($date)
    {
        return $this->model->where('is_published', 1)
            ->where('published_at', '<=', Carbon::now(\Illuminate\Support\Facades\Config::get('app.timezone'))->format('Y-m-d H:i:s'))
            ->orderBy('created_at', 'desc')->where('start_date', '<=', $date)
            ->where('end_date', '>=', $date)->get();
    }

    /**
     * Stores Event into database.
     *
     * @param array $payload
     *
     * @return Event
     */
    public function store($payload)
    {
        $payload['title'] = htmlentities($payload['title']);
        $payload['is_published'] = (isset($payload['is_published'])) ? (bool) $payload['is_published'] : 0;
        $payload['published_at'] = (isset($payload['published_at']) && !empty($payload['published_at'])) ? Carbon::parse($payload['published_at'])->format('Y-m-d H:i:s') : Carbon::now(\Illuminate\Support\Facades\Config::get('app.timezone'))->format('Y-m-d H:i:s');

        return $this->model->create($payload);
    }

    /**
     * Updates Event into database.
     *
     * @param Event $event
     * @param array $input
     *
     * @return Event
     */
    public function update($event, $payload)
    {
        $payload['title'] = htmlentities($payload['title']);
        if (!empty($payload['lang']) && $payload['lang'] !== \Illuminate\Support\Facades\Config::get('siravel.default-language', 'en')) {
            return $this->translationRepo->createOrUpdate($event->id, 'Casa\Models\Calendar\Event', $payload['lang'], $payload);
        } else {
            $payload['is_published'] = (isset($payload['is_published'])) ? (bool) $payload['is_published'] : 0;
            $payload['published_at'] = (isset($payload['published_at']) && !empty($payload['published_at'])) ? Carbon::parse($payload['published_at'])->format('Y-m-d H:i:s') : Carbon::now(\Illuminate\Support\Facades\Config::get('app.timezone'))->format('Y-m-d H:i:s');

            unset($payload['lang']);

            return $event->update($payload);
        }
    }
}
