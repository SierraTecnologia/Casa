<?php
/**
 * Fazer @todo
 */

namespace Casa;

use App\Models\User;
use Arrilot\Widgets\Facade as Widget;
use Muleta\Library;
use Config;
use Siravel\Models\Negocios\Menu;
use Siravel\Models\Negocios\MenuItem;
use Facilitador\Models\Permission;
use Porteiro\Models\Role;
use Facilitador\Models\Setting;
use Facilitador\Models\Translation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ReflectionClass;
use Request;
use Session;
use Siravel\Models\Blog\Category;
use Siravel\Models\Blog\Post;
use Siravel\Models\Negocios\Page;
use Pedreiro\Elements\FormFields\After\HandlerInterface as AfterHandlerInterface;
use Pedreiro\Elements\FormFields\HandlerInterface;
use Pedreiro\Events\AlertsCollection;
use Support\Models\Application\DataRow;
use Support\Models\Application\DataType;
use Pedreiro\Template\Actions\DeleteAction;
use Pedreiro\Template\Actions\EditAction;
use Pedreiro\Template\Actions\RestoreAction;
use Pedreiro\Template\Actions\ViewAction;
use Translation\Traits\HasTranslations;
use View;

class Casa
{
}
