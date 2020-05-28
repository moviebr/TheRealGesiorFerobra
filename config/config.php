<?PHP

$config['site']['serverPath'] = "/usr/local/server/";

# Configurações Novas by Movie
$config['site']['ipServer'] = "127.0.0.1";
$config['site']['director'] = "Ferobra Team";
$config['site']['Outfits_path'] = $config['site']['serverPath'] . "data/XML/outfits.xml";
$config['site']['Mounts_path'] = $config['site']['serverPath'] . "data/XML/mounts.xml";
$config['site']['Itens_path'] = $config['site']['serverPath'] . "data/items/items.xml";
$config['site']['Events_path'] = $config['site']['serverPath'] . "data/globalevents/globalevents.xml";
$config['site']['Quests_path'] = $config['site']['serverPath'] . "data/XML/quests.xml";

if ( ! function_exists('is_https'))
{
    function is_https()
    {
        if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off')
        {
            return TRUE;
        }
        elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')
        {
            return TRUE;
        }
        elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off')
        {
            return TRUE;
        }

        return FALSE;
    }
}

$is_https = is_https();

if ($is_https) {
    $base_url = "https://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
} else {
    $base_url = "http://" . $_SERVER['HTTP_HOST'];
    $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
}

$config['base_url'] = $base_url;
$config['site']['realurl'] = $base_url; //Colocar a url real para seu website sem www

# Using Ajax Field Validation, this is important if you want to use ajax check in your create account.
$config['site']['sqlHost'] = "localhost";
$config['site']['sqlUser'] = "root";
$config['site']['sqlPass'] = "";
$config['site']['sqlBD'] = "";

# Config Shop
$outfits_list = array();
$loyalty_title = array(
    50 => 'Scout',
    100 => 'Sentinel',
    200 => 'Steward',
    400 => 'Warden',
    1000 => 'Squire',
    2000 => 'Warrior',
    3000 => 'Keeper',
    4000 => 'Guardian',
    5000 => 'Sage
');
$config['shop']['newitemdays'] = 1;

/**
 * PAGSEGURO FIXED
 */
$config['pagseguro']['testing'] = true;
$config['pagseguro']['lightbox'] = true;
$config['pagseguro']['tokentest'] = "";

# Pagseguro configs
$config['pagseguro']['email'] = "";
$config['pagseguro']['token'] = "";
$config['pagseguro']['produtoNome'] = 'Premium Points';
$config['pagseguro']['urlRedirect'] =  $config['base_url'];
$config['pagseguro']['urlNotification'] = $config['base_url'].'retpagseguro.php';
$config['pagseguro']['offers'] = [
    500=>75,
    800=>125,
    1500=>250,
    2800=>500,
    4900=>1000
];

# Bank transfer data
$config['banktransfer']['bank'] = "Caixa Econômica";
$config['banktransfer']['agency'] = "";
$config['banktransfer']['account'] = "";
$config['banktransfer']['name'] = "";
$config['banktransfer']['operation'] = 003;

# PayPal configs
$config['paypal']['email'] = "";

# Social Networks
$config['social']['status'] = true;
$config['social']['facebook'] = "https://www.facebook.com/";

# Character Former name, time in days to show the former names
$config['site']['formerNames'] = 10;
$config['site']['formerNames_amount'] = 10;

# PAGE: characters.php
$config['site']['quests'] = array(
    "Demon Helmet" => 2213,
    "In Service of Yalahar" => 12279,
    "Pits Of Inferno" => 10544,
    "The Ancient Tombs" => 50220,
    "The Annihilator" => 2215,
    "The Demon Oak" => 1010,
    "Wrath Of The Emperor" => 12374
);

# PAGE: whoisonline.php
$config['site']['private-servlist.com_server_id'] = 0;

# Account Maker Config
$config['site']['encryptionType'] = 'sha1';
$config['site']['useServerConfigCache'] = false;
$towns_list = array(
    5 => 'Ab\'Dendriel',
    9 => 'Ankrahmun',
    4 => 'Carlin',
    10 => 'Darashia',
    11 => 'Edron',
    14 => 'Farmine',
    28 => 'Gray Beach',
    3 => 'Kazordoon',
    7 => 'Liberty Bay',
    8 => 'Port Hope',
    33 => 'Rathleton',
    12 => 'Svargrond',
    2 => 'Thais',
    1 => 'Venore',
    13 => 'Yalahar',
);

# Create Account Options
$config['site']['one_email'] = true;
$config['site']['create_account_verify_mail'] = false;
$config['site']['verify_code'] = true;
$config['site']['email_days_to_change'] = 3;
$config['site']['newaccount_premdays'] = 0;
$config['site']['send_register_email'] = true;
$config['site']['flash_client_enabled'] = false;

# Create Character Options
$config['site']['newchar_vocations'] = array(0 => 'Rook Sample', 1 => 'Sorcerer Sample', 2 => 'Druid Sample', 3 => 'Paladin Sample', 4 => 'Knight Sample');
$config['site']['newchar_towns'] = array(1);
$config['site']['max_players_per_account'] = 7;

# Emails Config
$config['site']['send_emails'] = true;
$config['site']['mail_address'] = "";
$config['site']['mail_senderName'] = "";
$config['site']['smtp_enabled'] = true;
$config['site']['smtp_host'] = "ssl://smtp.gmail.com";
$config['site']['smtp_port'] = 465;
$config['site']['smtp_auth'] = true;
$config['site']['smtp_user'] = "";
$config['site']['smtp_pass'] = "";
$config['site']['smtp_secure'] = true;

# PAGE: accountmanagement.php
$config['site']['send_mail_when_change_password'] = true;
$config['site']['send_mail_when_generate_reckey'] = true;
$config['site']['email_time_change'] = 7;
$config['site']['daystodelete'] = 7;

# PAGE: guilds.php
$config['site']['guild_need_level'] = 150;
$config['site']['guild_need_pacc'] = false;
$config['site']['guild_image_size_kb'] = 50;
$config['site']['guild_description_chars_limit'] = 2000;
$config['site']['guild_description_lines_limit'] = 6;
$config['site']['guild_motd_chars_limit'] = 250;

# PAGE: adminpanel.php
$config['site']['access_admin_panel'] = 3;

# PAGE: latestnews.php
$config['site']['news_limit'] = 6;

# PAGE: killstatistics.php
$config['site']['last_deaths_limit'] = 40;

# PAGE: team.php
$config['site']['groups_support'] = array(2, 3, 4, 5);

# PAGE: highscores.php
$config['site']['groups_hidden'] = array(3, 4, 5);
$config['site']['accounts_hidden'] = array(1);

# PAGE: lostaccount.php
$config['site']['email_lai_sec_interval'] = 180;

/**
 * DONATE CONFIG LIKE PAGASEGURO OLD_CONFIG
 * 100 = R$1,00 // 50 = TIBIA COINS COUNT
 *
 */
$config['donate']['offers'] = [
    500=>50,
    800=>125,
    1500=>250,
    2800=>500,
    4900=>1000
];
/**
 * configure your active payment method with this
 * TRUE = ACTIVE
 * FALSE = INACTIVE
 */
$config['paymentsMethods'] = [
    'pagseguro' => true,
    'paypal' => false,
    'transfer' => false
];

# Layout Config
$config['site']['layout'] = 'tibiacom';
$config['site']['vdarkborder'] = '#505050';
$config['site']['darkborder'] = '#D4C0A1';
$config['site']['lightborder'] = '#F1E0C6';
$config['site']['download_page'] = false;
$config['site']['serverinfo_page'] = true;