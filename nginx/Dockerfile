FROM nginx:stable-alpine

COPY ./hosts/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /data

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]