#!/usr/bin/env bash
cd wp-content/plugins/${PLUGIN_NAME} &&./vendor/bin/wilokecli make:unittest plugins ${PLUGIN_NAME} \
--homeurl=${WP_URL} --rb=${REST_BASE} --namespace=${TEST_NAMESPACE} --admin_username=${WP_ADMIN} --admin_password=${WP_ADMIN}
