<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Cargo
 *
 * @property int $idcargo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CargoTrans[] $cargotrans
 * @property-read int|null $cargotrans_count
 * @method static \Illuminate\Database\Eloquent\Builder|Cargo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cargo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cargo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cargo whereIdcargo($value)
 */
	class Cargo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CargoTrans
 *
 * @property int $idCargoTrans
 * @property string|null $cargoTrans
 * @property string|null $codigoIdioma
 * @property int $idCargo
 * @property-read \App\Models\Cargo $cargo
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans query()
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans whereCargoTrans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans whereCodigoIdioma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans whereIdCargo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CargoTrans whereIdCargoTrans($value)
 */
	class CargoTrans extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Institucion
 *
 * @property int $idInstitucion
 * @property string|null $tituloTrans
 * @property string|null $textoTrans
 * @property string|null $codigoIdioma
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion whereCodigoIdioma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion whereIdInstitucion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion whereTextoTrans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Institucion whereTituloTrans($value)
 */
	class Institucion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Miembro
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Miembro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Miembro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Miembro query()
 */
	class Miembro extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class User extends \Eloquent {}
}

