<?php
return [
    'db_host' => getenv('DB_HOST') ?: 'aws-0-ap-northeast-1.pooler.supabase.com',
    'db_port' => getenv('DB_PORT') ?: '5432',
    'db_name' => getenv('DB_NAME') ?: 'postgres',
    'db_user' => getenv('DB_USER') ?: 'postgres.sbvuvjbozukvhlaktwk',
    'db_pass' => getenv('DB_PASS') ?: 'JMnE@cj2PPKZq!PSBCK',
    'db_sslmode' => getenv('DB_SSLMODE') ?: 'require',
];