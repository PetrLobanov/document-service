FROM node:latest

WORKDIR /app

RUN npm install -g @vue/cli

RUN vue create .

EXPOSE 8080
CMD ["npm", "run", "serve"]