FROM ehsanfa/bandicoot

COPY laravel-interview.conf /etc/nginx/sites-available/default

COPY run-services.sh /opt/run-services.sh
RUN chmod 755 /opt/run-services.sh
CMD /opt/run-services.sh