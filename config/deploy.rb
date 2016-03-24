# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'mixinkey'
set :repo_url, 'git@github.com:mixinkey/mixinkey.git'
set :ssh_user, "chalas_r"
set :format, :pretty
set :log_level, :info
set :stage, "production"
set :deploy_to,   "/var/www/html/projects/mixinkey"
set :branch, "design"
set :pty, true
set :scm, :git
set :use_sudo, true
set :permission_method, :chmod
set :use_set_permissions, true
set :writable_dirs, ['storage']
set :keep_releases, 3
set :laravel_roles, :all
set :laravel_artisan_flags, "--env=production"
set :laravel_server_user, "www-data"
# Permissions
set :file_permissions_paths, fetch(:writable_dirs)
set :file_permissions_users, ['www-data']
set :webserver_user, "www-data"

namespace :deploy do
  task :check_permissions do
    on roles(:web) do
      execute "chmod -R 0777 #{release_path}/storage"
      execute "echo 'finished'"
    end
  end
end

after "deploy:finishing", "deploy:check_permissions"
after "deploy:check_permissions", "deploy:finished"
