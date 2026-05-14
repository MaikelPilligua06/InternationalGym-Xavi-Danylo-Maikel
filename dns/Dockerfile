FROM alpine:3.19
RUN apk add --no-cache dnsmasq
COPY dnsmasq.conf /etc/dnsmasq.conf
COPY hosts.local /etc/hosts.local
EXPOSE 53/udp
ENTRYPOINT ["dnsmasq", "--no-daemon"]
 
