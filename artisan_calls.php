Artisan Calls can be written within a class/model file
\Artisan::call('config:clear');


class TestController extends Controller
{
    public function index()
    {
        // Clear config cache to ensure env variables are loaded
        \Artisan::call('config:clear');

        // Pass it to the view
        return view('welcome');
    }
}
