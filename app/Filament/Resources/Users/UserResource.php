<?php

namespace App\Filament\Resources\Users;

use App\Filament\Resources\Users\Pages\CreateUser;
use App\Filament\Resources\Users\Pages\EditUser;
use App\Filament\Resources\Users\Pages\ListUsers;
use App\Filament\Resources\Users\Pages\ViewUser;
use App\Filament\Resources\Users\Schemas\UserForm;
use App\Filament\Resources\Users\Schemas\UserInfolist;
use App\Filament\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model = User::class;


//    protected static ?string $modelLabel = 'customer';
//    protected static ?string $pluralModelLabel = 'employee';
//    protected static bool $hasTitleCaseModelLabel = false;


//    protected static bool $shouldRegisterNavigation = false;
//    protected static ?string $navigationLabel = 'sales';
//
    protected static ?int $navigationSort = 1;
    protected static string|null|\UnitEnum $navigationGroup = 'Administration';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::UserGroup;
//    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';
//    protected static string | BackedEnum | null $activeNavigationIcon = Heroicon::UserCircle;


    protected static ?string $slug = 'user';


    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    protected static ?string $navigationBadgeTooltip = 'The number of users';



    protected static ?string $recordTitleAttribute = 'name';

//    public static function getRecordTitleAttribute(): ?string
//    {
//        return 'email';
//    }

    public static function form(Schema $schema): Schema
    {
        return UserForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }

//    public static function getEloquentQuery(): Builder
//    {
//        return static::getModel()::query()->where('email_verified_at', null);
//    }


}
