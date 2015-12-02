# server-based syntax
# ======================
# Defines a single server with a list of roles and multiple properties.
# You can define all roles on a single server, or split them:

# server 'example.com', user: 'deploy', roles: %w{app db web}, my_property: :my_value
# server 'example.com', user: 'deploy', roles: %w{app web}, other_property: :other_value
# server 'db.example.com', user: 'deploy', roles: %w{db}



# role-based syntax
# ==================

# Defines a role with one or multiple servers. The primary server in each
# group is considered to be the first unless any  hosts have the primary
# property set. Specify the username and a domain or IP for the server.
# Don't use `:all`, it's a meta role.

role :app, %w{chalas_r@dev.chalasdev.fr}
role :web, %w{chalas_r@dev.chalasdev.fr}

# ==================
# You may pass any option but keep in mind that net/ssh understands a
# limited set of options, consult the Net::SSH documentation.
# http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start
#
# Global options
# --------------
 set :ssh_options, {
   keys: %w(/Users/Robin/.ssh/id_rsa),
   forward_agent: false,
   auth_methods: %w(publickey password)
 }
#
# The server-based syntax can be used to override options:
# ------------------------------------
server 'dev.chalasdev.fr',
  user: 'chalas_r',
  roles: %w{web app},
  ssh_options: {
    user: 'chalas_r', # overrides user setting above
    keys: %w(/home/chalas_r/.ssh/id_rsa),
    forward_agent: false,
    auth_methods: %w(publickey password),
  }
