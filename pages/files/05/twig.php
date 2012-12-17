{% for user in users %}
    * {{ user.name }}
{% else %}
    No user have been found.
{% endfor %}
