<?php

namespace App\Providers;

use App\Repositories\Eloquent\AddressEloquentRepository;
use App\Repositories\Eloquent\AddressCreateEloquentRepository;
use App\Repositories\Eloquent\AddressUpdateEloquentRepository;
use App\Repositories\Eloquent\CityEloquentRepository;
use App\Repositories\Eloquent\CountryEloquentRepository;
use App\Repositories\Eloquent\DocumentEloquentRepository;
use App\Repositories\Eloquent\DocumentTypeEloquentRepository;
use App\Repositories\Eloquent\GenreEloquentRepository;
use App\Repositories\Eloquent\MatrialStatusEloquentRepository;
use App\Repositories\Eloquent\EmailEloquentRepository;
use App\Repositories\Eloquent\EmailCreateEloquentRepository;
use App\Repositories\Eloquent\EmailUpdateEloquentRepository;
use App\Repositories\Eloquent\IndividualPeopleEloquentRepository;
use App\Repositories\Eloquent\LegalPeopleEloquentRepository;
use App\Repositories\Eloquent\NotificationEloquentRepository;
use App\Repositories\Eloquent\NotificationCreateEloquentRepository;
use App\Repositories\Eloquent\NotificationUpdateEloquentRepository;
use App\Repositories\Eloquent\NotificationUserEloquentRepository;
use App\Repositories\Eloquent\OccupationEloquentRepository;
use App\Repositories\Eloquent\OccupationCreateEloquentRepository;
use App\Repositories\Eloquent\OccupationUpdateEloquentRepository;
use App\Repositories\Eloquent\PeopleEloquentRepository;
use App\Repositories\Eloquent\PeopleCreateEloquentRepository;
use App\Repositories\Eloquent\PeopleUpdateEloquentRepository;
use App\Repositories\Eloquent\PhoneEloquentRepository;
use App\Repositories\Eloquent\PhoneCreateEloquentRepository;
use App\Repositories\Eloquent\PhoneUpdateEloquentRepository;
use App\Repositories\Eloquent\DepartamentEloquentRepository;
use App\Repositories\Eloquent\DepartamentCreateEloquentRepository;
use App\Repositories\Eloquent\DepartamentUpdateEloquentRepository;
use App\Repositories\Eloquent\StateEloquentRepository;
use App\Repositories\Eloquent\UnitEloquentRepository;
use App\Repositories\Eloquent\UnitCreateEloquentRepository;
use App\Repositories\Eloquent\UnitUpdateEloquentRepository;
use App\Repositories\Eloquent\UserEloquentRepository;


use App\Repositories\RepositoryInterface;


use App\Services\AddressService;
use App\Services\AddressCreateService;
use App\Services\AddressUpdateService;
use App\Services\CityService;
use App\Services\CountryService;
use App\Services\DocumentService;
use App\Services\DocumentTypeService;
use App\Services\GenreService;
use App\Services\MatrialStatusService;
use App\Services\EmailService;
use App\Services\EmailCreateService;
use App\Services\EmailUpdateService;
use App\Services\IndividualPeopleService;
use App\Services\LegalPeopleService;
use App\Services\NotificationService;
use App\Services\NotificationCreateService;
use App\Services\NotificationUpdateService;
use App\Services\NotificationUserService;
use App\Services\PeopleService;
use App\Services\PeopleCreateService;
use App\Services\PeopleUpdateService;
use App\Services\PhoneService;
use App\Services\PhoneCreateService;
use App\Services\PhoneUpdateService;
use App\Services\DepartamentService;
use App\Services\DepartamentCreateService;
use App\Services\DepartamentUpdateService;
use App\Services\OccupationService;
use App\Services\OccupationCreateService;
use App\Services\OccupationUpdateService;
use App\Services\StateService;
use App\Services\UnitService;
use App\Services\UnitCreateService;
use App\Services\UnitUpdateService;
use App\Services\UserService;

use Illuminate\Support\ServiceProvider;

class EloquentRepositoryProvider extends ServiceProvider
{
    private array $services = [
        AddressService::class => AddressEloquentRepository::class,
        AddressCreateService::class => AddressCreateEloquentRepository::class,
        AddressUpdateService::class => AddressUpdateEloquentRepository::class,
        CityService::class => CityEloquentRepository::class,
        CountryService::class => CountryEloquentRepository::class,
        EmailService::class => EmailEloquentRepository::class,
        EmailCreateService::class => EmailCreateEloquentRepository::class,
        EmailUpdateService::class => EmailUpdateEloquentRepository::class,
        DocumentService::class => DocumentEloquentRepository::class,
        DocumentCreateService::class => DocumentCreateEloquentRepository::class,
        DocumentUpdateService::class => DocumentUpdateEloquentRepository::class,
        DocumentTypeService::class => DocumentTypeEloquentRepository::class,
        IndividualPeopleService::class => IndividualPeopleEloquentRepository::class,
        LegalPeopleService::class => LegalPeopleEloquentRepository::class,
        NotificationService::class => NotificationEloquentRepository::class,
        NotificationCreateService::class => NotificationCreateEloquentRepository::class,
        NotificationUpdateService::class => NotificationUpdateEloquentRepository::class,
        NotificationUserService::class => NotificationUserEloquentRepository::class,
        PeopleService::class => PeopleEloquentRepository::class,
        PeopleCreateService::class => PeopleCreateEloquentRepository::class,
        PeopleUpdateService::class => PeopleUpdateEloquentRepository::class,
        PhoneService::class => PhoneEloquentRepository::class,
        PhoneCreateService::class => PhoneCreateEloquentRepository::class,
        PhoneUpdateService::class => PhoneUpdateEloquentRepository::class,
        DepartamentService::class => DepartamentEloquentRepository::class,
        DepartamentCreateService::class => DepartamentCreateEloquentRepository::class,
        DepartamentUpdateService::class => DepartamentUpdateEloquentRepository::class,
        OccupationService::class => OccupationEloquentRepository::class,
        OccupationCreateService::class => OccupationCreateEloquentRepository::class,
        OccupationUpdateService::class => OccupationUpdateEloquentRepository::class,
        StateService::class => StateEloquentRepository::class,
        UnitService::class => UnitEloquentRepository::class,
        UnitCreateService::class => UnitCreateEloquentRepository::class,
        UnitUpdateService::class => UnitUpdateEloquentRepository::class,
        UserService::class => UserEloquentRepository::class,
        GenreService::class => GenreEloquentRepository::class,
        MatrialStatusService::class => MatrialStatusEloquentRepository::class,
        ProfessionService::class => ProfessionEloquentRepository::class,
    ];

    public function register(): void
    {
    }

    public function boot(): void
    {
        foreach ($this->services as $key => $value) {
            $this->app->when($key)->needs(RepositoryInterface::class)->give($value);
        }
    }
}
