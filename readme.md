# exert-canal

```bash
# 拉取
docker pull canal/canal-server:latest

# 获取 run.sh
wget https://raw.githubusercontent.com/alibaba/canal/master/docker/run.sh 

# 通过 run.sh 运行
sh run.sh -e canal.auto.scan=false \
        -e canal.destinations=test \
        -e canal.instance.master.address=127.0.0.1:3306 \
        -e canal.instance.dbUsername=canal \
        -e canal.instance.dbPassword=canal \
        -e canal.instance.connectionCharset=UTF-8 \
        -e canal.instance.tsdb.enable=true \
        -e canal.instance.gtidon=false \
        -e canal.instance.filter.regex=.*\\..*

# 或者自己写 docker run 脚本
docker run -itd -h 0 \
        --name=canal-server \
        -e canal.auto.scan=false \
        -e canal.destinations=test \
        -e canal.instance.master.address=127.0.0.1:3306 \
        -e canal.instance.dbUsername=canal \
        -e canal.instance.dbPassword=canal \
        -e canal.instance.connectionCharset=UTF-8 \
        -e canal.instance.tsdb.enable=true \
        -e canal.instance.gtidon=false  \
        -e canal.instance.filter.regex=.*\\..* \
        -p 11110:11110 \
        -p 11111:11111 \
        -p 11112:11112 \
        -p 9100:9100 \
        -m 4096m \
        canal/canal-server
```

容器内配置文件路径：
/home/admin/canal-server/conf/example/instance.properties
